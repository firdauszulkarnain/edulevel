@extends('main')

@section('title', 'Edu Level')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detail Program Edu Level</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
                        <li class="active">Detail</li>
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
                                <strong>Detail Program</strong>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm"><i
                                        class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-light">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%">Edulevel</th>
                                        <th>{{ $program->edulevel->name }} </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%">Jenjang</th>
                                        <th>{{ $program->name }} </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%">Harga / Siswa</th>
                                        <th>{{ $program->student_price }} </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%">Siswa Maksimal</th>
                                        <th>{{ $program->student_max }} </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%">Info</th>
                                        <th>{{ $program->info }}</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%">Tanggal Dibuat</th>
                                        <th>{{ $program->created_at }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
