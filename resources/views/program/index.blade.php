@extends('main')

@section('title', 'Edu Level')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-dashboard"></i></li>
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
                                <h3>Program</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs/add') }}" class="btn btn-info">Tambah Program</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            {{-- @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif --}}
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Program</th>
                                        <th scope="col">Edulevel</th>
                                        <th scope="col">Info</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $program)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $program->name }}</td>
                                            <td>{{ $program->edulevel_id }}</td>
                                            <td>{{ $program->info }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('programs/edit/' . $program->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                <form action="{{ url('programs/' . $program->id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="far fa-trash-alt"></i>
                                                </form>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
