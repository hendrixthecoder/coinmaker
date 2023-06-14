<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
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
}