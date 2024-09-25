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
                                <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Kategori :</b></label>
                                <input type="text" class="form-control" name="kategori" value="{{ $buku->kategori }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penulis :</b></label>
                                <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Jumlah Halaman :</b></label>
                                <input type="number" class="form-control" name="jml_hlmn" value="{{ $buku->jml_hlmn }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penerbit :</b></label>
                                <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Tanggal Terbit :</b></label>
                                <input type="date" class="form-control" name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
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
