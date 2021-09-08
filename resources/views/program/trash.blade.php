@extends('main')

@section('title', 'Program')


@section('breadcumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program Terhapus Edu Level</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
                        <li class="active">Trash</li>
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
                                <strong>Data Program Terhapus</strong>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs/delete') }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Delete All
                                </a>
                                <a href="{{ url('programs/restore') }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-undo"></i> Restore All
                                </a>
                                <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-chevron-left"></i> Back
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
                                                    <a href="{{ url('programs/restore' . $program->id) }}"
                                                        class="btn btn-info btn-sm text-light">
                                                        Restore
                                                    </a>
                                                    <a href="{{ url('programs/delete' . $program->id) }}"
                                                        class="btn btn-danger btn-sm text-light"
                                                        onclick="return confirm('Yakin Hapus Data?')">
                                                        Delete Permanently
                                                    </a>
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
