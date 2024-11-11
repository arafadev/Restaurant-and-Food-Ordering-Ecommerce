<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    function index()  {
        return view('admin.auth.login');
    }

    function forgetPassword() {
        return view('admin.auth.forget-password');
    }
}
