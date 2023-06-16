<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\InvestmentPlan;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard () {
        return view('admin.dashboard');
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
}