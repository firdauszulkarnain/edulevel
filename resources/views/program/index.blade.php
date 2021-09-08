@extends('main')

@section('title', 'Program')


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
                                <strong>Data Program Edu Level</strong>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs/trash') }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Trash
                                </a>
                                <a href="{{ url('programs/create') }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-plus"></i> Tambah Program
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Program</th>
                                        <th scope="col">Edulevel</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($programs->count() > 0)
                                        @foreach ($programs as $key => $program)
                                            <tr>
                                                <th scope="row">{{ $programs->firstItem() + $key }}</th>
                                                <td>{{ $program->name }}</td>
                                                <td>{{ $program->edulevel->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('programs/' . $program->id) }}"
                                                        class="btn btn-success btn-sm text-light"><i
                                                            class="far fa-eye"></i></a>
                                                    <a href="{{ url('programs/' . $program->id) . '/edit' }}"
                                                        class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                    <form action="{{ url('programs/' . $program->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Yakin Hapus Data?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="far fa-trash-alt"></i>
                                                    </form>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <small>
                                    Showing
                                    {{ $programs->firstItem() }}
                                    To
                                    {{ $programs->lastItem() }}
                                    Of
                                    {{ $programs->total() }}
                                    Entries
                                </small>
                            </div>
                            <div class="pull-right">
                                {{ $programs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
