@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Penerbit</div>
                    <div class="card-body">
                        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label"><b>Nama Penerbit :</b></label>
                                <input type="text" class="form-control @error('nama_penerbit') is-invalid @enderror"
                                    name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}">
                                @error('nama_penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Alamat :</b></label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ $penerbit->alamat }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="{{ url('penerbit') }}" class="btn btn-outline-danger">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
