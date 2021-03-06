@extends('main')

@section('title', 'Program')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Program Edu Level</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
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
                                <b>Edit Data Program</b>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs') }}" class="btn btn-sm btn-secondary"><i
                                        class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <form action="{{ url('programs/' . $program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Program</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" autocomplete="off" value="{{ old('name', $program->name) }}">
                                    @error('name')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Jenjang Edu Level</label>
                                    <select class="form-control @error('edulevel_id') is-invalid @enderror" id="edulevel_id"
                                        name="edulevel_id">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($edulevels as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('edulevel_id', $program->edulevel_id) == $item->id ? 'selected' : null }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('edulevel_id')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="student_price">Harga Member</label>
                                    <input type="number" class="form-control @error('student_price') is-invalid @enderror"
                                        id="student_price" name="student_price" autocomplete="off"
                                        value="{{ old('student_price', $program->student_price) }}">
                                    @error('student_price')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="student_max">Jumlah Siswa Maksimal</label>
                                    <input type="number" class="form-control @error('student_max') is-invalid @enderror"
                                        id="student_max" name="student_max" autocomplete="off"
                                        value="{{ old('student_max', $program->student_max) }}">
                                    @error('student_max')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="info">Informasi Tambahan</label>
                                    <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info"
                                        rows="5">{{ old('info', $program->info) }}</textarea>
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
