<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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
}