@extends('layout.layout')
@section('title', 'Tambah Pengguna')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3">Tambah Pengguna</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('pengguna.simpan')}}">
                        <div class="row">                           
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control mb-3" name="username" placeholder="Masukkan Username" required>
                                    <label>Password</label>
                                    <input type="password" class="form-control mb-3" name="password" placeholder="Masukkan Password" required>
                                    <label>Role</label>
                                    <select name="role" class="form-select mb-3" required>
                                        <option selected value="operator">Operator</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @csrf
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{route('pengguna.index')}}"><button type="submit" class="btn btn-danger">Kembali</button></a>
                        </div> 
                    </form>
                </div>
                <div class="card-footer">
                                     
                </div>
            </div>
        </div>
    </div>
</div>