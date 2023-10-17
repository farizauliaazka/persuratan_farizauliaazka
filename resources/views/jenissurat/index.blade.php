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
                                    <td>
                                        <a href="{{ url('/dashboard') }}/jenissurat/edit/{{ $js->id_jenis_surat }}">
                                            <button class="btn btn-success">Edit</button>
                                        </a>
                                        <form action="{{ url('dashboard', ['jenissurat','destroy', $js->id_jenis_surat]) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                        </form>
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
