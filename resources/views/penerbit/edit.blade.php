@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Penerbit</div>
                    <div class="card-body">
                        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label"><b>Nama Penerbit :</b></label>
                                <input type="text" class="form-control" name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Alamat :</b></label>
                                <input type="text" class="form-control" name="alamat" value="{{ $penerbit->alamat }}">
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
