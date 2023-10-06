@extends('layout.layout')
@section('title', 'Jenis Surat')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <span class="h3 text">Manajemen Jenis Surat</span>
                </div>
                <div class="card-body">
                    <table class="table table-hovered tabel-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JENIS SURAT</th>
                                <th>AKSI</th>
                            </tr>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ( $jenissurat as $js )
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $js->jenis_surat }}</td>
                                    <td><a href="{{ url('/dashboard') }}/jenissurat/edit">
                                        <button class="btn btn-success">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" class="hapusBtn btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{url('/dashboard')}}/jenissurat/tambah"><button class="btn btn-success">Tambah</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
