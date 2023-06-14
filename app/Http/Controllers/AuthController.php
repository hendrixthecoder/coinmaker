<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;

class AuthController extends Controller
{
    public function registerPage () {
        $countries = CountryListFacade::getList('en');
        return view('unauth.register', compact(['countries']));
    }

    public function loginPage () {
        return view('unauth.login');
    }

    public function create (Request $request) {
        $validated = $request->validate([
            'first_name' => 'bail|required|alpha|min:3',
            'last_name' => 'bail|required|alpha|min:3',
            'number' => 'bail|required|',
            'country' => 'required',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6|'
        ]);
        
        $user = User::create($validated);
        Auth::login($user);

        return redirect()->route('userDashboard');
    }

    public function login (Request $request) {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role->name == 'admin') return redirect()->intended('admin/dashboard');
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout (Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    
}