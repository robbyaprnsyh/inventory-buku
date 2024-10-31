<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $hobi = Hobi::paginate(5);
        return view('hobi.index', compact('hobi'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hobi' => 'required|unique:hobis,hobi|string|max:255',
        ]);

        $hobi = new Hobi;
        $hobi->hobi = $request->hobi;
        $hobi->save();

        return redirect()->route('hobi.index')
            ->with('success', 'Data Berhasil Di Tambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'hobi' => 'required|unique:hobis,hobi',
        ]);

        $hobi = Hobi::findOrFail($id);
        $hobi->hobi = $request->hobi;
        $hobi->save();

        return redirect()->route('hobi.index')
            ->with('success', 'Data Berhasil Di Ubah!');
    }

    public function destroy(string $id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();

        return redirect()->route('hobi.index')
            ->with('success', 'Data Berhasil Di Hapus!');
    }
}
