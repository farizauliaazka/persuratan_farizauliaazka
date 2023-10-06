@extends('layout.layout')
@section('title', 'Kelola Pengguna')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <span class="h3">
                    Ubah data User
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                        <p>
                        <hr>                   
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username"/>
                                <input type="hidden" class="id_user">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>