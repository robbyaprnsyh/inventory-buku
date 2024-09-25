@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Data Buku</div>
                    <div class="card-body">
                        <a href="{{ route('buku.create') }}" class="btn btn-outline-primary">Add Data</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Jumlah Halaman</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Tanggal Terbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($buku as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>{{ $data->penulis }}</td>
                                        <td>{{ $data->jml_hlmn }} Halaman</td>
                                        <td>{{ $data->penerbit }}</td>
                                        <td>{{ $data->tgl_terbit }}</td>
                                        <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{ route('buku.edit', $data->id) }}"
                                                    class="btn btn-outline-warning">Edit</a>
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda ingin menghapus?')">Delete</button>
                                            </td>
                                        </form>
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
