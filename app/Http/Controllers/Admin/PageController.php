<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\InvestmentPlan;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Withdrawal;

class PageController extends Controller
{
    public function dashboard () {
        $deposits = Deposit::where('status', 'Pending')->sum('amount');
        $withdrawals = Withdrawal::where('status', 'Pending')->sum('amount');
        $users = count(User::all());
        $plans = count(InvestmentPlan::all());
        return view('admin.dashboard', compact(['deposits', 'withdrawals', 'users', 'plans']));
    }

    public function deposits () {
        $deposits = Deposit::where('status', 'Pending')->orderBy('id', 'desc')->paginate(6);
        return view('admin.deposits', compact(['deposits']));
    }

    public function manageUsers() {
        $users = User::where('role_id', 1)->paginate(5);
        return view('admin.manage-users', compact(['users']));
    }

    public function plans() {
        $plans = InvestmentPlan::all();
        return view('admin.plans', compact(['plans']));
    }

    public function manageWithdrawals () {
        $withdrawals = Withdrawal::where('status', 'Pending')->orderBy('id', 'desc')->paginate(6);
        return view('admin.manage-withdrawals', compact(['withdrawals']));
    }

    public function editPaymentMethods () {
        $btc = PaymentMethod::find(1);
        $eth = PaymentMethod::find(2);
        $usdt = PaymentMethod::find(3);
        $bnb = PaymentMethod::find(4);
        $trx = PaymentMethod::find(5);
        $matic = PaymentMethod::find(6);
        $solana = PaymentMethod::find(7);
        return view('admin.payment-methods', compact(['btc', 'eth', 'usdt', 'bnb','trx','matic','solana']));
    }
    
}