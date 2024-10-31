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
                @if (session('error'))
                    <div class="bg-red-600 text-white p-3 rounded mt-3">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                    <div class="bg-gray-300 p-4 text-center text-xl font-semibold">{{ __('Profile') }}</div>

                    <div class="p-6">
                        <form action="{{ route('profile.store', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="mb-4 flex justify-center items-center">
                                <img src="{{ asset('images/profile/' . $profile->cover) }}" alt="{{ $profile->cover }}"
                                    class= "w-44 h-40 rounded-3xl">
                            </div>

                            <div class="mb-4">
                                <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Nama Lengkap') }} :
                                </label>
                                <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2">
                                    {{ $profile->nama_lengkap }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="tgl_lahir" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Tanggal Lahir') }} :
                                </label>
                                <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2">
                                    {{ $profile->tgl_lahir }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="jk" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Jenis Kelamin') }} :
                                </label>
                                <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2">
                                    {{ $profile->jk }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Alamat') }} :
                                </label>
                                <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2">
                                    {{ $profile->alamat }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Agama') }} :
                                </label>
                                <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2">
                                    {{ $profile->agama }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="hobi" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Hobi') }} :
                                </label>
                                @foreach ($profile->hobi as $data)
                                    <p class="text-gray-600 flex items-center w-full h-8 bg-gray-200 rounded-lg px-2 mb-2">
                                        {{ $data->hobi }}
                                    </p>
                                @endforeach
                            </div>

                            <div class="flex items-center justify-center">
                                <a href="{{ route('profile.edit', $profile->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Edit Profile') }}
                                </a>
                                <a href="{{ route('password.edit', Auth::id()) }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Edit Password') }}
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
