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
        
    }
}
