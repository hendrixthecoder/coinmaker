<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserPlan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;
use App\Models\Withdrawal;

class FundsController extends Controller
{
    public function joinPlan (Request $request) {
        
        $request->validate([
            'amount' => 'bail|required|',
            'plan_id' => 'bail|required'
        ]);
        $amount = $request->amount;
        $balance = (float) str_replace(',','', $request->user()->getBalance());
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
        $request->validate([
            'amount' => 'bail|required|numeric|min:50',
            'method' => 'bail|required|'
        ]);
        $user = $request->user();
        
        $balance = (float)str_replace(',', '', $user->getBalance());

        if($balance <= $request->amount) return back()->with('error', 'Insufficient funds!');

        $withdrawal = new Withdrawal();

        if($request->method == 'BTC') {
            if(is_null($user->btc_address)) return redirect()->route('edit-withdrawal')->with('error', 'Set your BTC wallet address first!');
            
            $withdrawal->receive_details = $user->btc_address;
        }
        
        if($request->method == 'ETH') {
            if(is_null($user->eth_address)) return redirect()->route('edit-withdrawal')->with('error', 'Set your ETH wallet address first!');
            
            $withdrawal->receive_details = $user->eth_address;
        }

        if($request->method == 'BNB') {
            if(is_null($user->bnb_address)) return redirect()->route('edit-withdrawal')->with('error', 'Set your BNB wallet address first!');
            
            $withdrawal->receive_details = $user->bnb_address;
        }
        
        if($request->method == 'TRX') {
            if(is_null($user->trx_address)) return redirect()->route('edit-withdrawal')->with('error', 'Set your TRX wallet address first!');
            
            $withdrawal->receive_details = $user->trx_address;
        }

        if($request->method == 'USDT') {
            if(is_null($user->usdt_address)) return redirect()->route('edit-withdrawal')->with('error', 'Set your USDT wallet address first!');
            
            $withdrawal->receive_details = $user->usdt_address;
            
        }

        $withdrawal->user_id = $user->id;
        $withdrawal->name = $user->first_name.' '.$user->last_name;
        $withdrawal->amount = $request->amount;
        $withdrawal->source = $request->method;
        $withdrawal->type = 'Debit';
        $withdrawal->email = $user->email;
        $withdrawal->status = 'Pending';

        function generateTransactionId() {
            $id = substr(md5(rand()), 0, 25);

            if(checkId($id)){
                return generateTransactionId();
            }

            return $id;
        }

        function checkId($id) {
            return Withdrawal::where('transaction_id', $id)->first();
        }

        $withdrawal->transaction_id = generateTransactionId();
        $withdrawal->receive_method = $request->method;
        $withdrawal->save();

        return back()->with('success', 'Withdrawal placed successfully, wait for system to approve the transaction!');
        
    }
}