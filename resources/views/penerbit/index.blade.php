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
                    <div class="card-header">Data Penerbit</div>
                    <div class="card-body">
                        <a href="{{ route('penerbit.create') }}" class="btn btn-outline-primary">Add Data</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Penerbit</th>
                                    <th scope="col">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($penerbit as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->nama_penerbit }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <form action="{{ route('penerbit.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{ route('penerbit.edit', $data->id) }}"
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
