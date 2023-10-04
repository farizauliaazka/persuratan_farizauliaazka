<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index()
    {
        //buat form login
        if (!Auth::user()) {
            return view('login.formlogin');
        } else {
            if (Auth::user()->role === 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }
        }
    }
    public function check(Request $request)
    {
        $akun = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
        );
        if (Auth::attempt($akun)) {
            // $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }
        }
        return redirect()->to('auth');
    }
    public function logout()
    {
        # code...
    }
}