@extends('layout.layout')
@section('title', 'Tambah Surat')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3">Tambah Surat</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('surat.simpan') }}">
                        <div class="row">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="from-group">
                                    <label>Ringkasan</label>
                                    <input type="text" class="form-control mb-3" name="ringkasan" placeholder="Masukkan ringkasan" required>
                                    <label>Jenis Surat</label>
                                    <input type="text" class="form-control mb-3" name="jenis_surat" placeholder="Masukkan jenis surat" required>
                                    <label>Tanggal Surat</label>
                                    <input type="date" class="form-control mb-3" name="tanggal_surat" placeholder="Masukkan tanggal surat" required>
                                    <label>File</label>
                                    <input type="file" class="form-control mb-3" name="file" placeholder="Masukkan file" required>
                                    @csrf
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