@extends('main')

@section('title', 'Edu Level')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program Edu Level</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
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
                                <b>Tambah Data Program</b>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs') }}" class="btn btn-sm btn-secondary"><i
                                        class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <form action="{{ url('programs') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Program</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" autocomplete="off" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Jenjang Edu Level</label>
                                    <select class="form-control @error('edulevel_id') is-invalid @enderror" id="edulevel_id"
                                        name="edulevel_id">
                                        <option>-- Pilih --</option>
                                        @foreach ($edulevels as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('edulevel_id') == $item->id ? 'selected' : null }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('edulevel_id')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga Member</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" autocomplete="off" value="{{ old('price') }}">
                                    @error('price')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="student_max">Jumlah Siswa Maksimal</label>
                                    <input type="number" class="form-control @error('student_max') is-invalid @enderror"
                                        id="student_max" name="student_max" autocomplete="off"
                                        value="{{ old('student_max') }}">
                                    @error('student_max')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="info">Informasi Tambahan</label>
                                    <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info"
                                        rows="5">{{ old('info') }}</textarea>
                                    @error('info')
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
