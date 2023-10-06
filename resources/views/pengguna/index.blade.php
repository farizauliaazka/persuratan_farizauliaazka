@extends('layout.layout')
@section('title', 'Kelola Pengguna')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Daftar User</span>
            </div>
            <div class="card-body">
                <table class="table table-hovered table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $pengguna)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pengguna->username }}</td>
                                <td class="text-capitalize">{{$pengguna->role}}</td>
                                <td>
                                    <a href="{{ url('/dashboard') }}/manage-user/edit/{{ $pengguna->id_user }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="/delete/{{ $pengguna->id_user }}" class="hapusBtn btn btn-danger">Hapus</a>                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{url('/dashboard')}}/manage-user/tambah"><button class="btn btn-success">Tambah</button></a>
            </div>
        </div>
    </div>
</div>