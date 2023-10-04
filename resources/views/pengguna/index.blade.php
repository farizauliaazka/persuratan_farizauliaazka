@extends('layout.layout')
@section('title', 'Kelola Pengguna')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hovered table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Username</th>
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
                                <td>
                                    <a href="{{ url('/dashboard') }}/edit/{{ $pengguna->id_user }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <button class="hapusBtn btn btn-danger"
                                        idUser="{{ $pengguna->id_user }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>