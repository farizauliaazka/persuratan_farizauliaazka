@extends('layout.layout')
@section('title', 'Tambah Surat')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('surat.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan Surat:</label>
                            <input type="text" name="ringkasan" class="form-control" id="ringkasan" required>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_surat">Jenis Surat</label>
                            <select class="form-control" name="id_jenis_surat" id="id_jenis_surat">
                                @foreach ($jenissurat as $jenis)
                                    <option value="{{$jenis->$id}}">{{$jenis->nama}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat:</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="file">File Surat:</label>
                            <input type="file" name="foto" class="form-control-file" id="foto" accept="image/*">
                        </div>
                        <!-- Tambahkan input lain sesuai kebutuhan -->

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
