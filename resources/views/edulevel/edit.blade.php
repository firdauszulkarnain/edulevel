@extends('main')

@section('title', 'Edu Level')


@section('breadcumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Jenjang Edu Level</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Jenjang</a></li>
                    <li class="active">Edit</li>
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
                            <b>Edit Data Jenjang Sekolah</b>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('edulevels') }}" class="btn btn-sm btn-secondary"><i class="fa fa-undo"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ url('edulevels/' . $edulevel->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Jenjang Sekolah</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $edulevel->name) }}" autofocus autocomplete="off">
                                @error('nama')
                                <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Deskripsi</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="5" autocomplete="off">{{ old('desc', $edulevel->desc) }}</textarea>
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