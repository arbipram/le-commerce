<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SweetAlert;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $user = User::where('email',$request->email)->where('status','Enable')->where('role','1')->first();
        if (!empty($user) && Hash::check($request->password, $user->password)) {
            session()->put('name', $user->name);
            session()->put('email', $user->email);
            session()->put('role', $user->role);
            
            return redirect('/admin/dashboard');
        } else {
            alert()->error('Login Gagal Email atau Password Tidak Sesuai', '');
            return redirect()->back();
        }
    }

    public function login(Request $request)
    {
        return view('admin.login');
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('admin/login');
    }
}
