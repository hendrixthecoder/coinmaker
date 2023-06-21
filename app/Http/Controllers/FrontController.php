<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home()
    {
        return view('unauth.home');
    }

    public function about()
    {
        return view('unauth.about-us');
    }

    public function contact()
    {
        return view('unauth.contact');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required|',
            'email' => 'bail|required|email',
            'subject' => 'bail|required|',
            'number' => 'bail|required|',
            'message' => 'bail|required|',
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUsMail($validated));

        return back()->with('success', 'Mail sent succesfully!');
    }
}