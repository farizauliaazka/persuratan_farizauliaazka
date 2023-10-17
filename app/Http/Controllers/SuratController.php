<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat; // Pastikan Anda mengganti ini sesuai dengan model Surat yang Anda gunakan

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all(); // Mengambil semua data surat dari model Surat

        return view('surat.index', compact('surat'));
    }

    public function tambah()
    {
        // Tampilkan form untuk menambahkan surat
        return view('surat.tambah');
    }

    public function simpan(Request $request)
    {
       // Validasi data yang diterima dari form
    $request->validate([
        // 'id_user_' => 'required',
        'ringkasan' => 'required',
        'jenis_surat'=>'required',
        'tanggal_surat' => 'required',
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk jenis dan ukuran foto
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    // Simpan file foto ke direktori yang sesuai di dalam storage
    if ($request->file('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/file', $fileName); // Simpan foto di dalam direktori 'public/foto-surat'

        // Simpan data surat ke database
        $surat = new Surat;
        $surat->file = 'storage/file/' . $fileName; // Simpan path ke database
        $surat->ringkasan = $request->ringkasan;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->id_user = $request->id_user;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->save();
        
        \Log::info('Data surat berhasil disimpan: ' . $surat);

        return redirect('/dashboard/surat')->with('success', 'Surat berhasil ditambahkan');
    } else {
        return redirect('/dashboard/surat')->with('error', 'Foto surat tidak valid');
    }
    }

    public function edit($id)
    {
        $surat = Surat::find($id);

        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'ringkasan' => 'required',
        'id_jenis_surat' => 'required',
        'tanggal_surat' => 'required',
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    $surat = Surat::find($id);

    // Hapus gambar lama jika ada
    if ($request->hasFile('foto') && file_exists(public_path($surat->foto))) {
        unlink(public_path($surat->foto));
    }

    // Simpan gambar baru jika diunggah
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto-surat', $fileName);
        $surat->foto = 'storage/foto-surat/' . $fileName;
    }

    // Update data surat lainnya
    $surat->ringkasan = $request->ringkasan;
    $surat->id_jenis_surat = $request->id_jenis_surat;
    $surat->tanggal_surat = $request->tanggal_surat;
    // tambahkan atribut lain sesuai kebutuhan
    $surat->save();

    return redirect('/dashboard/surat')->with('success', 'Surat berhasil diperbarui');
}

    public function destroy($id)
    {
        $surat = Surat::find($id);

        //\Log::info('Menghapus surat dengan ID: ' . $id);

        if (!$surat) {
            return response()->json(['success' => false, 'message' => 'Surat tidak ditemukan']);
        }

        // Hapus file foto jika ada
        if (file_exists(public_path($surat->foto))) {
            unlink(public_path($surat->foto));
        }

        // Hapus surat dari database
        $surat->delete();

        return response()->json(['success' => true, 'message' => 'Surat berhasil dihapus']);

    }

}
