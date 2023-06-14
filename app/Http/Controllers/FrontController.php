<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home () {
        return view('unauth.home');
    }

    public function about () {
        return view('unauth.about-us');
    }

    public function contact () {
        return view('unauth.contact');
    }

}