@extends('layout.layout')
@section('title','Data Surat')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Daftar Surat</span>
            </div>
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Foto
                            </th>
                            <th>
                                Ringkasan
                            </th>
                            <th>
                                Jenis Surat
                            </th>
                            <th>
                                Tanggal Surat
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($surat as $sr)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$sr->ringkasan}}</td>
                            <td>{{$sr->tanggal_surat}}</td>
                            <td>{{$sr->id_jenis_surat}}</td>
                            <td>
                                <a href="{{url('/')}}/surat/edit/{{$sr->id_surat}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <button class="hapusBtn btn btn-danger" idSurat="{{$sr->id_surat}}">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{url('/dashboard')}}/surat/tambah"><btn class="btn btn-success">Tambah </btn></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="module">
$('.DataTable tbody').on('click','.hapusBtn',function(a){
    a.preventDefault();
    let idSurat = $(this).closest('.hapusBtn').attr('idSurat');
    swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('edit/hapus/'+idSurat).then(function(response){
                    console.log(response);
                    if(response.data.success){
                        swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }else{
                        swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }
                }).catch(function(error){
                    swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                //Refresh Halaman
                               
                            });
                });
            }
        });
});
$('.DataTable').DataTable();
</script>
@endsection