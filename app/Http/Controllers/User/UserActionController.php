<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function updateAccount (Request $request) {
        $validated = $request->validate([
            'first_name' => 'bail|required|alpha|min:3',
            'last_name' => 'bail|required|alpha|min:3',
            'number' => 'bail|required|',
            'country' => 'required',
            'email' => 'bail|required|email',
        ]);

        $request->user()->update($validated);

        return back()->with('success', 'Account updated successfully!');
        
    }

    public function changePassword (Request $request) {
        
        $request->validate([
            'curr_password' => 'bail|required',
            'password' => 'bail|required|min:6|confirmed',
            'password_confirmation' => 'bail|required',
        ]);

        $user = $request->user();

        if(Hash::check($request->curr_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', 'Password changed successfully!');
        }

        return back()->with('error', 'Invalid Password!');
    }

    public function editWithdrawalInfo (Request $request) {
        dd($request->all()); 
    }
}