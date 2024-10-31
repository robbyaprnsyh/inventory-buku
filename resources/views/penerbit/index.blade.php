@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-md mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg">
                    <div class="px-4 py-2 border-b">
                        <h2 class="text-lg font-semibold">Data Penerbit</h2>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('penerbit.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Data</a>
                        <table class="min-w-full mt-4">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2 text-left">No</th>
                                    <th class="px-4 py-2 text-left">Nama Penerbit</th>
                                    <th class="px-4 py-2 text-left">Alamat</th>
                                    <th class="px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($penerbit as $data)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $no++ }}</td>
                                        <td class="px-4 py-2">{{ $data->nama_penerbit }}</td>
                                        <td class="px-4 py-2">{{ $data->alamat }}</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <a href="{{ route('penerbit.edit', $data->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('penerbit.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600" onclick="return confirm('Apakah anda ingin menghapus?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
