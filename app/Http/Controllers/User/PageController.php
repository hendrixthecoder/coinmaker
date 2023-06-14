<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    
    public function dashboard (Request $request) {
        $balance = number_format($request->user()->getBalance(), 2);
        
        return view('user.dashboard', compact(['balance']));
    }

    public function deposits (Request $request) {
        
        $deposits = $request->user()->deposits()->orderBy('id', 'desc')->paginate(3);
        $balance = number_format($request->user()->getBalance(), 2);
        
        return view('user.deposits', compact(['deposits', 'balance']));
    }

    public function makePayment () {
        
        if (!Session::get('amount')) return redirect()->route('deposits')->with('error', 'Put in amount to continue');
        
        return view('user.make-payment');
    }

    
}