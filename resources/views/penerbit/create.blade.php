@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Data Penerbit</div>
                    <div class="card-body">
                        <form action="{{ route('penerbit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"><b>Nama Penerbit :</b></label>
                                <input type="text" class="form-control" name="nama_penerbit" required
                                    placeholder="Masukan Nama Penerbit">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Alamat :</b></label>
                                <input type="text" class="form-control" name="alamat" required
                                    placeholder="Masukan Alamat Penerbit">
                            </div>
                            <a href="{{ url('penerbit') }}" class="btn btn-outline-danger">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
