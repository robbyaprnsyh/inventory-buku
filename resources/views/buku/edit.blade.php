@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Buku</div>
                    <div class="card-body">
                        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label"><b>Judul Buku :</b></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ $buku->judul }}">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Kategori :</b></label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $buku->id_kategori ? 'selected' : '' }}>
                                            {{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penulis :</b></label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                    name="penulis" value="{{ $buku->penulis }}">
                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Jumlah Halaman :</b></label>
                                <input type="number" class="form-control @error('jml_hlmn') is-invalid @enderror"
                                    name="jml_hlmn" value="{{ $buku->jml_hlmn }}">
                                @error('jml_hlmn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penerbit :</b></label>
                                <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                                    name="penerbit" value="{{ $buku->penerbit }}">
                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Tanggal Terbit :</b></label>
                                <input type="date" class="form-control @error('tgl_terbit') is-invalid @enderror"
                                    name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
                                @error('tgl_terbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Cover :</b></label>
                                <img src="{{ asset('/images/buku/' . $buku->cover) }}" style="width:70px; height:100%;">
                                <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                    name="cover">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="{{ url('buku') }}" class="btn btn-outline-danger">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
