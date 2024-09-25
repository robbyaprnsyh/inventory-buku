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
                                <input type="text" class="form-control" name="judul" required
                                    placeholder="Masukan Judul Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Kategori :</b></label>
                                <input type="text" class="form-control" name="kategori" required
                                    placeholder="Masukan Kategori Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penulis :</b></label>
                                <input type="text" class="form-control" name="penulis" required
                                    placeholder="Masukan Penulis Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Jumlah Halaman :</b></label>
                                <input type="number" class="form-control" name="jml_hlmn" required
                                    placeholder="Masukan Jumlah Halaman Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Penerbit :</b></label>
                                <input type="text" class="form-control" name="penerbit" required
                                    placeholder="Masukan Penerbit Buku">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Tanggal Terbit :</b></label>
                                <input type="date" class="form-control" name="tgl_terbit" required>
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
