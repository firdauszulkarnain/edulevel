@extends('main')

@section('title', 'Edu Level')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Jenjang Edu Level</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Jenjang</a></li>
                        <li class="active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <b>Tambah Data Jenjang Sekolah</b>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('edulevels') }}" class="btn btn-sm btn-secondary"><i
                                        class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <form action="{{ url('edulevels/') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Jenjang Sekolah</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" autocomplete="off" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Deskripsi</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc"
                                        rows="5">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
