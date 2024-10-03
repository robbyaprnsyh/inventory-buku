@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Data Buku</div>
                    <div class="card-body">
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"><b>Judul Buku :</b></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" required placeholder="Masukan Judul Buku">
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
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penulis :</b></label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" required
                                    placeholder="Masukan Penulis Buku">
                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Jumlah Halaman :</b></label>
                                <input type="number" class="form-control @error('jml_hlmn') is-invalid @enderror" name="jml_hlmn" required
                                    placeholder="Masukan Jumlah Halaman Buku">
                                @error('jml_hlmn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penerbit :</b></label>
                                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" required
                                    placeholder="Masukan Penerbit Buku">
                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Tanggal Terbit :</b></label>
                                <input type="date" class="form-control @error('tgl_terbit') is-invalid @enderror" name="tgl_terbit" required>
                                @error('tgl_terbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Cover :</b></label>
                                <input type="file" class="form-control" name="cover" accept="image/*" required>
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="{{ url('buku') }}" class="btn btn-outline-danger">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
