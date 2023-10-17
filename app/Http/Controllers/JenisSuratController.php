<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenissurat = JenisSurat::all();
        return view('jenissurat.index', compact('jenissurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $data = ['jenissurat' => JenisSurat::all()];
        return view('jenissurat.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'jenis_surat' => 'required',
        ]);
        $js = new JenisSurat($data);
        $js->save();
        return redirect()->to('/dashboard/jenissurat')->with('success', 'Surat berhasil ditambah');
    }

    public function edit($id)
    {
        $js = JenisSurat::find($id);
        
        if (!$js) {
            return redirect()->route('jenissurat.index')->with('error', 'Pengguna tidak ditemukan');
        }
        
        return view('jenissurat.edit', compact('js'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'jenis_surat' => ['required'],
        ]);

        $js = JenisSurat::query()->find($id);
        $js -> fill($data);
        $js -> save();

        return redirect('/dashboard/jenissurat')->with('success', 'Jenis Surat berhasil di update');
    }

    public function destroy($id)
    {
        $js = JenisSurat::find($id);
        if($js){
            $js->delete();
        }
        return redirect()->route('jenissurat.index')->with('success', 'Data berhasil dihapus');
    }
}
