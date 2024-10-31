@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg">
                    <div class="px-6 py-4 bg-gray-300">
                        <h2 class="text-lg font-bold text-center">Edit Data Buku</h2>
                    </div>
                    <div class="px-6 py-4">
                        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="judul"><b>Judul Buku :</b></label>
                                <input type="text" id="judul" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('judul') border-red-500 @enderror"
                                    name="judul" value="{{ $buku->judul }}">
                                @error('judul')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="id_kategori"><b>Kategori :</b></label>
                                <select id="id_kategori" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('id_kategori') border-red-500 @enderror" name="id_kategori">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $buku->id_kategori ? 'selected' : '' }}>
                                            {{ $data->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="penulis"><b>Penulis :</b></label>
                                <input type="text" id="penulis" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('penulis') border-red-500 @enderror"
                                    name="penulis" value="{{ $buku->penulis }}">
                                @error('penulis')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="jml_hlmn"><b>Jumlah Halaman :</b></label>
                                <input type="number" id="jml_hlmn" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('jml_hlmn') border-red-500 @enderror"
                                    name="jml_hlmn" value="{{ $buku->jml_hlmn }}">
                                @error('jml_hlmn')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="penerbit"><b>Penerbit :</b></label>
                                <input type="text" id="penerbit" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('penerbit') border-red-500 @enderror"
                                    name="penerbit" value="{{ $buku->penerbit }}">
                                @error('penerbit')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="tgl_terbit"><b>Tanggal Terbit :</b></label>
                                <input type="date" id="tgl_terbit" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('tgl_terbit') border-red-500 @enderror"
                                    name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
                                @error('tgl_terbit')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700" for="cover"><b>Cover :</b></label>
                                <img src="{{ asset('/images/buku/' . $buku->cover) }}" class="w-20 h-auto mb-2" alt="Cover Image">
                                <input type="file" id="cover" class="mt-1 block w-full p-2 bg-gray-200 rounded-md shadow-sm @error('cover') border-red-500 @enderror"
                                    name="cover">
                                @error('cover')
                                    <span class="text-red-500 text-sm mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="flex justify-start">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 mr-2">Edit</button>
                                <a href="{{ url('buku') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
