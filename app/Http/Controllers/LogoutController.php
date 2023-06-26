<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        //Functionality test
        //dd('working');
        //Logout using the auth helper through the logout method
        auth()->logout();
        //Redirect the user to the login page
        return redirect()->route('login');
    }
}