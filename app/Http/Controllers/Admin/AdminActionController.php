<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvestmentPlan;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class AdminActionController extends Controller
{
    public function approveDeposit (Request $request) {
        $request->validate([
            'id' => 'required|numeric|exists:deposits,id'
        ]);

        $deposit = Deposit::find($request->id);
        $deposit->status = 'Processed';
        $deposit->save();
        
        Storage::disk('public')->delete($deposit->proof_path);

        return back()->with('success', 'Deposit approved successfully!');
        
    }
    
    public function declineDeposit (Request $request) {
        $request->validate([
            'id' => 'required|numeric|exists:deposits,id'
        ]);

        $deposit = Deposit::find($request->id);
        $deposit->status = 'Declined';
        $deposit->save();

        Storage::disk('public')->delete($deposit->proof_path);

        return back()->with('success', 'Deposit declined successfully!');
    }

    public function creditUser (Request $request) {
        $request->validate([
            'id' => 'required|numeric|exists:users,id',
            'amount' => 'required|numeric',
        ]);

        $user = User::find($request->id);
        
        $transaction = new Transaction();
        $transaction->name = $user->first_name.' '.$user->last_name;
        $transaction->email = $user->email;
        $transaction->type = 'Credit';
        $transaction->amount = $request->amount;
        $transaction->source = 'Top Up';
        $transaction->status = 'Processed';
        $transaction->pay_day = now();
        $transaction->end_day = now();
        $transaction->whereToCredit = 'Balance';
        $transaction->user_id = $user->id;

        $transaction->save();

        return back()->with('success', 'User has been credited successfully!');
    }
    
    public function debitUser (Request $request) {
        $request->validate([
            'id' => 'required|numeric|exists:users,id',
            'amount' => 'required|numeric',
        ]);

        $user = User::find($request->id);
        
        $transaction = new Transaction();
        $transaction->name = $user->first_name.' '.$user->last_name;
        $transaction->email = $user->email;
        $transaction->type = 'Debit';
        $transaction->amount = $request->amount;
        $transaction->source = 'Reversal';
        $transaction->status = 'Processed';
        $transaction->pay_day = now();
        $transaction->end_day = now();
        $transaction->whereToDebit = 'Balance';
        $transaction->user_id = $user->id;

        $transaction->save();

        return back()->with('success', 'User has been credited successfully!');
    }

    public function createPlan (Request $request) {
        $validated = $request->validate([
            'plan_name' => 'bail|required|alpha|unique:investment_plans,plan_name',
            'min_deposit' => 'bail|required|numeric',
            'max_deposit' => 'bail|required|numeric',
            'weekly_earnings' => 'bail|required|numeric'
        ]);

        $validated['duration'] = 12;
        
        InvestmentPlan::create($validated);

        return back()->with('success', 'Investment Plan created successfully');
    }
    
}