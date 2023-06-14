<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserActionController extends Controller
{
    public function create (Request $request) {
        $request->validate([
           'amount' => 'bail|required|numeric',
           'source' => 'required|alpha',
           'proof' => 'bail|required|image|mimes:png,jpg,jpeg|max:5120'
        ]);
        
        $newDeposit = new Deposit();
        
        $newDeposit->user_id = $request->user()->id;
        $newDeposit->amount = $request->amount;
        $newDeposit->source = $request->source;
        $newDeposit->status = 'Pending';
    
        function generateTransactionId() {
            $id = substr(md5(rand()),0,25);
    
            if(checkId($id)){
                return generateTransactionId();
            }
    
            return $id;
        }
    
        function checkId($id) {
            return Deposit::where('transaction_id', $id)->first();
        }
    
        $newDeposit->transaction_id = generateTransactionId();
    
        // $upload_dir = "../cloud/uploads/proof";
        // $filename = Carbon::now()->timestamp.'.'.$request->file('proof')->getClientOriginalExtension();
    
        // $request->file('proof')->move($upload_dir, $filename);
    
        $newDeposit->proof_path = $request->file('proof')->store('proof','public');
        $newDeposit->save();

        Session::remove('amount');
    
        return redirect()->route('deposits')->with('success', 'Deposit made successfully, wait for system to approve!');
    }

    public function sendAmount (Request $request) {
        $request->validate([
            'amount' => 'bail|numeric'
        ]);
        
        Session::put('amount', $request->amount);
        
        return redirect()->route('makePayment');
    }
}