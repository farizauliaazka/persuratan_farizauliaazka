@extends('layout.layout')
@section('title', 'Edit Jenis Surat')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3">Edit Jenis Surat</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jenissurat.update', $js->id_jenis_surat )}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <input type="text" class="form-control mb-3" name="jenis_surat" placeholder="Masukkan jenis surat" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>