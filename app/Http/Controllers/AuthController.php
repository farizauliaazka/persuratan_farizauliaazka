<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Konstruktor
    public function __construct()
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Buat Form Login
         if (!Auth::user()) {
            return view('login.form');
        } else {
            if (Auth::user()->role === 'admin') {
                return redirect()->to('/dashboard/perusahaan');
            } else {
                return redirect()->to('/kasir/dashboard');
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
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') :
                return redirect()->to('');
            else :
                return redirect()->to('');
            endif;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
