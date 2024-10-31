@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="text-lg font-semibold mb-4 text-center">Add Data Buku</div>
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="judul"><b>Judul Buku
                                    :</b></label>
                            <input type="text" id="judul"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('judul') border-red-500 @enderror"
                                name="judul" required placeholder="Masukan Judul Buku">
                            @error('judul')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="id_kategori"><b>Kategori
                                    :</b></label>
                            <select id="id_kategori"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('id_kategori') border-red-500 @enderror"
                                name="id_kategori">
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="penulis"><b>Penulis
                                    :</b></label>
                            <input type="text" id="penulis"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('penulis') border-red-500 @enderror"
                                name="penulis" required placeholder="Masukan Penulis Buku">
                            @error('penulis')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="jml_hlmn"><b>Jumlah Halaman
                                    :</b></label>
                            <input type="number" id="jml_hlmn"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('jml_hlmn') border-red-500 @enderror"
                                name="jml_hlmn" required placeholder="Masukan Jumlah Halaman Buku">
                            @error('jml_hlmn')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="penerbit"><b>Penerbit
                                    :</b></label>
                            <input type="text" id="penerbit"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('penerbit') border-red-500 @enderror"
                                name="penerbit" required placeholder="Masukan Penerbit Buku">
                            @error('penerbit')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="tgl_terbit"><b>Tanggal Terbit
                                    :</b></label>
                            <input type="date" id="tgl_terbit"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm @error('tgl_terbit') border-red-500 @enderror"
                                name="tgl_terbit" required>
                            @error('tgl_terbit')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="cover"><b>Cover
                                    :</b></label>
                            <input type="file" id="cover"
                                class="mt-1 block w-full border p-2 bg-gray-200 rounded-md shadow-sm" name="cover"
                                accept="image/*" required>
                            @error('cover')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="flex justify-start">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mr-2">Save</button>
                            <a href="{{ url('buku') }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
