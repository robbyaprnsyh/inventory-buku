<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobi = Hobi::where('id_hobi');
        $profile = Profile::where('id_user', Auth::id())->first();
        return view('profile.index', compact('profile', 'hobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingProfile = Profile::where('id_user', Auth::id())->first();

        if ($existingProfile) {
            return redirect()->route('profile.index')->with('error', 'Anda Sudah Memiliki Profile!');
        }

        $hobi = Hobi::all();
        return view('profile.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tgl_lahir' => 'required|date|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
            'jk' => 'required',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|string|max:15',
            'cover' => 'required',
        ]);

        $profile = new Profile;
        $profile->id_user = auth()->user()->id;
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->jk = $request->jk;
        $profile->alamat = $request->alamat;
        $profile->agama = $request->agama;

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile', $name);
            $profile->cover = $name;
        }
        $profile->save();
        $profile->hobi()->attach($request->hobi);
        return redirect()->route('profile.index')
            ->with('success', 'Data Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hobi = Hobi::all();
        $profile = Profile::findOrFail($id);
        $selectHobi = $profile->hobi->pluck('id')->toArray();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tgl_lahir' => 'required|date|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
            'jk' => 'required',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|string|max:15',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->jk = $request->jk;
        $profile->alamat = $request->alamat;
        $profile->agama = $request->agama;

        // upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile', $name);
            $profile->cover = $name;
        }
        $profile->save();
        $profile->hobi()->sync($request->hobi);
        return redirect()->route('profile.index')
            ->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        if ($profile->cover && file_exists(public_path('images/profile/' . $profile->cover))) {
            unlink(public_path('images/profile/' . $profile->cover));
        }
        $profile->delete();
        return redirect()->route('profile.index')
            ->with('success', 'Data Berhasil Di Hapus!');
    }
}
