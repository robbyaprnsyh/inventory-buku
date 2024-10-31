@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-300 p-4 text-center text-xl font-semibold">{{ __('Complete Your Profile') }}</div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('profile.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Nama Lengkap') }} :
                                </label>
                                <input id="nama_lengkap" type="text"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('nama_lengkap') border-red-500 @enderror"
                                    name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    autocomplete="nama_lengkap">
                                @error('nama_lengkap')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tgl_lahir" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Tanggal Lahir') }} :
                                </label>
                                <input id="tgl_lahir" type="date"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('tgl_lahir') border-red-500 @enderror"
                                    name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir">
                                @error('tgl_lahir')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="jk" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Jenis Kelamin') }} :
                                </label>
                                <select name="jk" id="jk" value="{{ old('jk') }}"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2 @error('jk') border-red-500 @enderror">
                                    <option class="text-gray-600">Pilih Jenis Kelamin</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                                @error('jk')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Alamat') }} :
                                </label>
                                <textarea name="alamat" id="alamat" value="{{ old('alamat') }}"
                                    class="form-control w-full h-20 bg-gray-200 rounded-lg px-2 @error('alamat') border-red-500 @enderror" required></textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Agama') }} :
                                </label>
                                <select name="agama" id="agama" value="{{ old('agama') }}"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2 @error('agama') border-red-500 @enderror">
                                    <option class="text-gray-600">Pilih Agama</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Buddha</option>
                                    <option>Katolik</option>
                                </select>
                                @error('agama')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="hobi" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Hobi') }} :
                                </label>
                                <select name="hobi[]" class="form-select select-multiple w-full h-8 bg-gray-200 rounded-xl px-2 @error('hobi') border-red-500 @enderror" multiple>
                                    @foreach ($hobi as $data)
                                        <option value="{{ $data->id }}">{{ $data->hobi }}</option>
                                    @endforeach
                                </select>
                                @error('hobi')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="cover" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Image') }} :
                                </label>
                                <input id="cover" type="file"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2  @error('cover') border-red-500 @enderror"
                                    name="cover" accept="image/*" required>
                                @error('cover')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
