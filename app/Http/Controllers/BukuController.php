<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('buku.index', compact('buku', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'penulis' => 'required',
            'jml_hlmn' => 'required|numeric|min:1',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
            'cover' => 'required',
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->cover = $name;
        }
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
        $kategori = Kategori::all();
        $buku = Buku::findOrFail(id: $id);
        return view('buku.edit', data: compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'penulis' => 'required',
            'jml_hlmn' => 'required|numeric|min:1',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->cover = $name;
        }
        $buku->save();
        return redirect()->route('buku.index')
            ->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail(id: $id);
        if ($buku->cover && file_exists(public_path('images/buku/' . $buku->cover))) {
            unlink(public_path('images/buku/' . $buku->cover));
        }
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success', 'Data Berhasil Di Hapus!');
    }
}
