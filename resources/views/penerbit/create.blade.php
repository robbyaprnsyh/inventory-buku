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
                <div class="bg-white shadow-md rounded-lg">
                    <div class="px-4 py-2 border-b bg-gray-300">
                        <h2 class="text-lg font-semibold text-center p-2 bg">Add Data Penerbit</h2>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('penerbit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1" for="nama_penerbit"><b>Nama Penerbit :</b></label>
                                <input type="text" id="nama_penerbit" name="nama_penerbit" required placeholder="Masukan Nama Penerbit"
                                    class="block w-full p-2 bg-gray-300 rounded-md shadow-sm @error('nama_penerbit') border-red-500 @enderror">
                                @error('nama_penerbit')
                                    <span class="text-red-500 text-sm mt-1">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1" for="alamat"><b>Alamat :</b></label>
                                <input type="text" id="alamat" name="alamat" required placeholder="Masukan Alamat Penerbit"
                                    class="block w-full p-2 bg-gray-300 rounded-md shadow-sm @error('alamat') border-red-500 @enderror">
                                @error('alamat')
                                    <span class="text-red-500 text-sm mt-1">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex justify-start">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mr-2">Save</button>
                                <a href="{{ url('penerbit') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
