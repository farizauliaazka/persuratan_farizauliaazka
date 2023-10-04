@extends('layout.layout')
@section('title', 'Daftar Surat')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Daftar surat</span>
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
                        @foreach($surat as $s)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <!-- Tampilkan gambar/foto surat -->
                                <img src="{{ asset($s->foto) }}" alt="Foto Surat" style="max-width: 95px; height: auto;">
                            </td>
                            <td>{{$s->ringkasan}}</td>
                            <td>{{$s->id_jenis_surat}}</td>
                            <td>{{$s->tanggal_surat}}</td>
                            <td>
                                <a href="{{url('/dashboard')}}/surat/edit/{{$s->id_surat}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <button class="hapusBtn btn btn-danger" data-idSurat="{{ $s->id_surat }}">Hapus</button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{url('/dashboard')}}/surat/tambah"><button class="btn btn-success">Tambah </button></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    // Contoh skrip JavaScript untuk mengirim permintaan DELETE menggunakan Axios

$('.DataTable tbody').on('click', '.hapusBtn', function(a) {
    a.preventDefault();
    let idSurat = $(this).data('idSurat');

    // Tampilkan peringatan konfirmasi sebelum menghapus surat
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, kirim permintaan DELETE menggunakan Axios
            axios.delete(/dashboard/surat/${idSurat}, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    // Surat berhasil dihapus
                    Swal.fire(
                        'Dihapus!',
                        'Surat berhasil dihapus.',
                        'success'
                    );
                    // Di sini Anda dapat melakukan hal-hal tambahan seperti memperbarui tampilan atau reload halaman
                } else {
                    // Gagal menghapus surat, tampilkan pesan error jika diperlukan
                    Swal.fire(
                        'Gagal!',
                        'Surat gagal dihapus.',
                        'error'
                    );
                }
            })
            .catch(function(error) {
                // Tangani kesalahan saat menghapus surat
                console.error('Terjadi kesalahan:', error);
            });
        }
    });
});

$('.DataTable').DataTable();
// ...

</script>
@endsection
