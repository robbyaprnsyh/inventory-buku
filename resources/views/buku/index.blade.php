@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-center">
            <div class="w-full max-w-5xl">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg mt-4">
                    <div class="px-4 py-2 border-b">
                        <h2 class="text-lg font-semibold">Data Buku</h2>
                    </div>
                    <div class="p-4">
                        @can('create-buku')
                        <a href="{{ route('buku.create') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Data</a>
                        @endcan
                        <div class="mt-4 overflow-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm text-center">
                                        <th class="py-3 px-4">No</th>
                                        <th class="py-3 px-4">Judul</th>
                                        <th class="py-3 px-4">Kategori</th>
                                        <th class="py-3 px-4">Penulis</th>
                                        <th class="py-3 px-4 truncate">Jumlah Halaman</th>
                                        <th class="py-3 px-4">Penerbit</th>
                                        <th class="py-3 px-4 truncate">Tanggal Terbit</th>
                                        <th class="py-3 px-4">Cover</th>
                                        @can(['edit-buku', 'delete-buku'])
                                        <th class="py-3 px-4">Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = ($buku->currentPage() - 1) * $buku->perPage() + 1; @endphp
                                    @foreach ($buku as $data)
                                        <tr class="border-b text-center">
                                            <td class="py-1.5 px-4 truncate">{{ $no++ }}</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->judul }}</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->kategori->kategori }}</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->penulis }}</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->jml_hlmn }} Halaman</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->penerbit }}</td>
                                            <td class="py-1.5 px-4 truncate">{{ $data->tgl_terbit }}</td>
                                            <td class="py-1.5 px-4 truncate">
                                                <img src="{{ asset('/images/buku/' . $data->cover) }}"
                                                    alt="{{ $data->judul }} Cover" class="w-16 h-auto">
                                            </td>
                                            <td class="py-2 px-4 truncate">
                                                <form action="{{ route('buku.destroy', $data->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex justify-between">
                                                        @can('edit-buku')
                                                        <a href="{{ route('buku.edit', $data->id) }}">
                                                            <svg class="h-8 w-8 text-yellow-200 hover:text-yellow-400" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                                <line x1="16" y1="5" x2="19" y2="8" />
                                                            </svg>
                                                        </a>
                                                        @endcan
                                                        @can('delete-buku')
                                                        <button type="submit" onclick="return confirm('Apakah anda ingin menghapus?')">
                                                            <svg class="h-8 w-8 text-red-400 hover:text-red-600" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                        </button>
                                                        @endcan
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $buku->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
