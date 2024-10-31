@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="text-center mb-6 mt-12">
            <h2 class="text-3xl font-semibold">{{ __('Welcome to the Dashboard!') }}</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-full">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4 ">

                    <div class="bg-gray-100 text-black rounded-lg shadow-lg p-4 ">
                        <h1 class="font-bold text-xl flex justify-between">Buku</h1>
                        <div class="mt-4">
                            <a class="text-blue-600 hover:text-red-600" href="{{ url('/buku') }}">Lihat Detail</a>
                        </div>
                    </div>

                    <div class="bg-gray-100 text-black rounded-lg shadow-lg p-4">
                        <div class="font-bold text-xl flex justify-between">Kategori</div>
                        <div class="mt-4">
                            <a class="text-blue-600 hover:text-red-600" href="{{ url('/kategori') }}">Lihat Detail</a>
                        </div>
                    </div>

                    <div class="bg-gray-100 text-black rounded-lg shadow-lg p-4">
                        <div class="font-bold text-xl flex justify-between">Penerbit</div>
                        <div class="mt-4">
                            <a class="text-blue-600 hover:text-red-600" href="{{ url('/penerbit') }}">Lihat Detail</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
