<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        dd($request);
    }

    public function login(Request $request)
    {
        return view('admin.login');
    }
}
