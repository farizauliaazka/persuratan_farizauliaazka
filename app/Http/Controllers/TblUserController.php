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
            'user' => TblUser::all()
        ];
        return view('pengguna.index', $data);
    }

    public function tambah()
    {
        $data = ['user' => TblUser::all()];
        return view('pengguna.tambah', $data);
    }

    public function edit()
    {
        $data = ['user'=>TblUser::all()];
        return view('pengguna.edit', $data);
    }

    public function delete($id)
    {
        $user = TblUser::find($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data Berhasil Dihapus');
    }
}
