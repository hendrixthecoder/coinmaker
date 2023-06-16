<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserPlan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;

class FundsController extends Controller
{
    public function joinPlan (Request $request) {
        
        $request->validate([
            'amount' => 'bail|required|',
            'plan_id' => 'bail|required'
        ]);
        
        $amount = $request->amount;
        $balance = $request->user()->getBalance();
        $plan = InvestmentPlan::findOrFail($request->plan_id);
        
        
        if($balance < $plan->min_deposit) return back()->with('error', 'Insufficient Funds!') ;
        if($amount > $plan->max_deposit) return back()->with('error', 'Amount greater than the maximum deposit for this plan, consider reducing amount or joining a higher plan.');
        if($amount < $plan->min_deposit) return back()->with('error', 'Amount less than the minimum deposit for this plan, consider increasing amount or going for a lower plan.');

        for($i = 1; $i <= $plan->duration; $i++){
            
            $profit = new Transaction();
            $profit->name = $request->user()->first_name.''.$request->user()->last_name;
            $profit->email = $request->user()->email;
            $profit->type = 'Credit';
            $profit->source = 'ROI';
            $profit->amount = ($amount * $plan->weekly_earnings) / 100;
            $profit->status = 'Processed';
            $profit->pay_day = now()->addWeeks($i);
            $profit->whereToCredit = 'Profit';
            $profit->user_id = $request->user()->id;
            $profit->end_day = now()->addWeeks($plan->duration);
            $profit->save();
        }

        $balanceBack = new Transaction();
        $balanceBack->name = $request->user()->first_name.''.$request->user()->last_name;
        $balanceBack->email = $request->user()->email;
        $balanceBack->type = 'Credit';
        $balanceBack->amount = $amount;
        $balanceBack->source = 'Capital';
        $balanceBack->status = 'Processed';
        $balanceBack->pay_day = now();
        $balanceBack->end_day = now()->addWeeks($plan->duration);
        $balanceBack->whereToCredit = 'Balance';
        $balanceBack->user_id = $request->user()->id;
        $balanceBack->save();

        $pay_day = now()->addWeeks($plan->duration);

        $user_plan = new UserPlan();
        $user_plan->user_id = $request->user()->id;
        $user_plan->amount = $amount;
        $user_plan->pay_day = $pay_day;
        $user_plan->plan_id = $plan->id;
        $user_plan->plan_name = $plan->plan_name;
        $user_plan->plan_profit = (($amount * $plan->weekly_earnings) / 100) * $plan->duration;
        $user_plan->save();

        $request->user()->investmentPlans()->attach($plan->id, ['amount' => $amount, 'pay_day' => $pay_day]);

        return back()->with('success', 'Plan has been joined successfully! Profits will automatically be added to your balance weekly for 12 weeks.');
    }

    public function newWithdrawal (Request $request) {
        dd('Creating new withdrawal of $'.$request->amount);
    }
}