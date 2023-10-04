<?php

namespace App\Http\Controllers;

use App\Models\TblUser;
use Illuminate\Http\Request;

class TblUserController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new TblUser;
    }

    public function index()
    {
        $data = [
            'tbl_user' => TblUser::all()
        ];
        return view('pengguna.index', $data);
    }

    public function tambah()
    {
        $data = ['tbl_user' => TblUser::all()];
        return view('pengguna.tambah');
    }
    public function edit()
    {
        $data = ['tbl_user'=>TblUser::all()];
        return view('pengguna.edit', $data);
    }
}
