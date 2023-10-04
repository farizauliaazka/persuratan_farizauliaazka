<?php

namespace App\Http\Controllers;

use App\Models\TblUser;

class DashboardController extends Controller
{
    public function index()
    {
        $data = ['user'=>TblUser::all()];
        return view('dashboard.index', $data);
    }   
}