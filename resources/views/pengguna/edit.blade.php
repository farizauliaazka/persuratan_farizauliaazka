@extends('layout.layout')
@section('title', 'Edit Pengguna')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3">Edit Pengguna</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('pengguna.update', $user->id_user)}}">
                        <div class="row">                           
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control mb-3" name="username" placeholder="Masukkan Username" required>
                                    <label>Role</label>
                                    <select name="role" class="form-select mb-3" required>
                                        <option value="operator"{{$user->role === 'operator' ? 'selected' : ''}}>Operator</option>
                                        <option value="admin"{{$user->role === 'admin' ? 'selected' : ''}}>Admin</option>
                                    </select>
                                    @csrf
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{route('pengguna.index')}}"><button type="sumbit" class="btn btn-danger">Kembali</button></a>
                        </div> 
                    </form>
                </div>
                <div class="card-footer">
                                     
                </div>
            </div>
        </div>
    </div>
</div>