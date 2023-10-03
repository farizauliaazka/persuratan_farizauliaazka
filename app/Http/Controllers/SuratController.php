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

    public function store(Request $request)
    {
       // Validasi data yang diterima dari form
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk jenis dan ukuran foto
        'ringkasan' => 'required',
        'tanggal_surat' => 'required',
        'id_jenis_surat' => 'required',
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    // Simpan file foto ke direktori yang sesuai di dalam storage
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto-surat', $fileName); // Simpan foto di dalam direktori 'public/foto-surat'

        // Simpan data surat ke database
        $surat = new Surat;
        $surat->foto = 'storage/foto-surat/' . $fileName; // Simpan path ke database
        $surat->ringkasan = $request->ringkasan;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->id_jenis_surat = $request->id_jenis_surat;
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

    public function update($id, Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'ringkasan' => 'required',
            'id_jenis_surat' => 'required',
            'tanggal_surat' => 'required',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        $surat = Surat::find($id);
        $surat->id_user = auth()->id();
        $surat->foto = $request->foto;
        $surat->ringkasan = $request->ringkasan;
        $surat->id_jenis_surat = $request->id_jenis_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        // tambahkan atribut lain sesuai kebutuhan

        $surat->save();

        return redirect('/dashboard/surat')->with('success', 'Surat berhasil diperbarui');
    }

    // public function destroy(Surat $surat, Request $request)
    // {
    public function destroy($id)
    {
        $surat = Surat::find($id);
        if (!$surat) {
            return redirect('/dashboard/surat')->with('error', 'Surat tidak ditemukan');
        }
            
        // Periksa apakah file foto ada dan hapus jika ada
        $fileFoto = public_path($surat->foto);
        if (file_exists($fileFoto)) {
            unlink($fileFoto); // Hapus file foto
        }
            
        $surat->delete();
            
        return redirect('/dashboard/surat')->with('success', 'Surat berhasil dihapus');
    }
   

}
