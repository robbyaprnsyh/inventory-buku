@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-300 p-4 text-center text-xl font-semibold">{{ __('Edit Your Profile') }}</div>

                    <div class="p-6">
                        <form action="{{ route('profile.update', $profile->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Nama Lengkap') }} :
                                </label>
                                <input id="nama_lengkap" type="text" value="{{ $profile->nama_lengkap }}"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('nama_lengkap') border-red-500 @enderror"
                                    name="nama_lengkap" value="{{ old('nama_lengkap') }}" autocomplete="nama_lengkap">
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
                                <input id="tgl_lahir" type="text" value="{{ $profile->tgl_lahir }}"
                                    class="form-input w-full h-8 bg-gray-200 rounded-lg px-2 @error('tgl_lahir') border-red-500 @enderror"
                                    name="tgl_lahir" value="{{ old('tgl_lahir') }}">
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
                                <select name="jk" id="jk" value="{{ $profile->jk }}"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2 @error('jk') border-red-500 @enderror">
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
                                <textarea name="alamat" id="alamat"
                                    class="form-control w-full h-20 bg-gray-200 rounded-lg px-2 @error('alamat') border-red-500 @enderror">{{ $profile->alamat }}</textarea>
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
                                <select name="agama" id="agama" value="{{ $profile->agama }}"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2 @error('agama') border-red-500 @enderror">
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
                                <select name="hobi[]"
                                    class="form-select select-multiple w-full h-8 bg-gray-200 rounded-xl px-2 @error('hobi') border-red-500 @enderror"
                                    multiple value="{{ $profile->hobi }}">
                                    @foreach ($hobi as $data)
                                        <option value="{{ $data->id }}"
                                            {{ in_array($data->id, $selectHobi) ? 'selected' : '' }}>
                                            {{ $data->hobi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('hobi')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <label for="cover" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Image') }} :
                            </label>
                            <div class="mb-4 flex justify-center items-center">
                                <img src="{{ asset('images/profile/' . $profile->cover) }}"
                                    class="w-20 h-25 rounded-3xl mr-2" alt="Cover Image">
                                <input id="cover" type="file"
                                    class="form-control w-full h-8 bg-gray-200 rounded-lg px-2 @error('cover') border-red-500 @enderror"
                                    name="cover" accept="image/*">
                                @error('cover')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-center gap-2">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ route('profile.index') }}" type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __(' Kembali') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
