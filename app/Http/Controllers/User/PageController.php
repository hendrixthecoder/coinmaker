<?php

namespace App\Http\Controllers\User;

use App\Models\UserPlan;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Monarobase\CountryList\CountryListFacade;

class PageController extends Controller
{
    
    public function dashboard (Request $request) {
        $balance = $request->user()->getBalance();
        $profit = number_format($request->user()->getDueProfit(), 2);
        $packages = count($request->user()->userPlans()->where('pay_day', '>=', now())->get());
        $withdrawals = number_format($request->user()->withdrawals()->where('status', 'Processed')->sum('amount'), 2);
        return view('user.dashboard', compact(['balance', 'profit', 'packages', 'withdrawals']));
    }

    public function deposits (Request $request) {
        
        $deposits = $request->user()->deposits()->orderBy('id', 'desc')->paginate(3);
        $balance = $request->user()->getBalance();
        
        return view('user.deposits', compact(['deposits', 'balance']));
    }

    public function makePayment () {
        if (!Session::get('amount')) return redirect()->route('deposits')->with('error', 'Put in amount to continue');
        return view('user.make-payment');
    }

    public function plans () {
        $plans = InvestmentPlan::all();
        return view('user.plans', compact(['plans']));
    }

    public function updateAccount () {
        $countries = CountryListFacade::getList('en');
        return view('user.update-account', compact(['countries']));
    }

    public function withdrawalInfo () {
        return view('user.withdrawal-info');
    }

    public function support () {
        return view('user.support');
    }

    public function transactionHistory (Request $request) {
        $transactions = $request->user()->transactions()->where('source', 'Top Up')->orderBy('id', 'desc')->paginate(
            $perPage = 10, $columns = ['*'], $pageName = 'top-up'
        );

        // $bonus = $request->user()->transactions()->where('whereToCredit','Bonus')->orderBy('id', 'desc')->paginate(
        // $perPage = 10, $columns = ['*'], $pageName = 'bonus'
        // );

        $roi = $request->user()->transactions()->where('whereToCredit', 'Profit')->orderBy('id', 'desc')->where('pay_day','<=',now())->paginate(
            $perPage = 10, $columns = ['*'], $pageName = 'roi'
        );

        $reversals = $request->user()->transactions()->where('source', 'Reversal')->orWhere('source', 'Profit Reversal')->orWhere('source', 'Bonus Reversal')->orderBy('id', 'desc')->paginate(
            $perPage = 10, $columns = ['*'], $pageName = 'reversals'
        );

        $capitalReturns = $request->user()->transactions()->where('source', 'Capital')->where('end_day', '<', now())->orderBy('id', 'desc')->paginate(
            $perPage = 10, $columns = ['*'], $pageName = 'capital-returns'
        );

        
        return view('user.transaction-history', compact(['transactions', 'roi', 'capitalReturns', 'reversals']));
    }

    public function myPlans (Request $request) {
        $user = $request->user();
        
        $bronze_plans = UserPlan::where('user_id', $user->id)->where('plan_name', 'Bronze')->where('pay_day','>',now())->paginate(
            $perPage = 5, $columns = ['*'], $pageName = 'bronze'
        );

        $bronze_plan_count = count($bronze_plans);

        $total_bronze_profit = number_format($bronze_plans->sum('plan_profit'),0,'.',',');

        


        $silver_plans = UserPlan::where('user_id', $user->id)->where('plan_name', 'Silver')->where('pay_day','>',now())->paginate(
            $perPage = 5, $columns = ['*'], $pageName = 'silver'
        );

        $silver_plan_count = count($silver_plans);

        $total_silver_profit = number_format($silver_plans->sum('plan_profit'),0,'.',',');



        
        $gold_plans = UserPlan::where('user_id', $user->id)->where('plan_name', 'Gold')->where('pay_day','>',now())->paginate(
            $perPage = 5, $columns = ['*'], $pageName = 'gold'
        );

        $gold_plan_count = count($gold_plans);

        $total_gold_profit = number_format($gold_plans->sum('plan_profit'),0,'.',',');
        
        return view('user.my-plans', compact([
            'bronze_plans', 
            'bronze_plan_count', 
            'total_bronze_profit', 
            'silver_plans', 
            'silver_plan_count', 
            'total_silver_profit',
            'gold_plans',
            'gold_plan_count',
            'total_gold_profit'
        ]));
    }

    public function withdrawals (Request $request) {
        $withdrawals = $request->user()->withdrawals()->orderBy('id', 'desc')->paginate(6);
        $balance = $request->user()->getBalance();
        return view('user.withdrawals', compact(['withdrawals', 'balance']));
    }

    
}