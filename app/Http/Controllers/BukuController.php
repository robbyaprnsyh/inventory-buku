<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        return view('buku.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'kategori' => 'required',
            'penulis' => 'required',
            'jml_hlmn' => 'required',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->kategori = $request->kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.index')
            ->with('success', 'Data Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'kategori' => 'required',
            'penulis' => 'required',
            'jml_hlmn' => 'required',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->kategori = $request->kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.index')
            ->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data Berhasil Di Hapus!');
    }
}
