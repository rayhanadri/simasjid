<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function login()
    {
        return view('LoginPage');
    }

    public function index()
    {
        return view('LoginPage');
    }
}
