<?php

namespace App\Http\Controllers;

use App\Models\TblUser;
use Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = new TblUser($data);
        $user->password = Hash::make($data['password']);
        $user->save();
        Alert::success('Data berhasil ditambah');
        return redirect()->to('/dashboard/manage-user');
    }


    public function edit($id)
    {
        $user = TblUser::find($id);
        
        if (!$user) {
            return redirect()->route('pengguna.index')->with('error', 'Pengguna tidak ditemukan');
        }
        
        return view('pengguna.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'username' => ['required', 'max:40'],
            'role' => ['required']
        ]);

        $user = TblUser::query()->find($id);
        $user -> fill($data);
        $user -> save();

        return redirect('/dashboard/manage-user')->with('success', 'User berhasil di update');
    }
    
    public function destroy($id)
    {
       $user = TblUser::find($id);
       if($user){
            $user->delete();
        }
       return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus');
    }

}