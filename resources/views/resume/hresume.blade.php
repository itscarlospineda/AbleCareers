@extends('adminlte::page')

@section('title', 'Vista de Resumes')

@section('content_header')
<div class="card">
    <div class="card-header bg-success">
        <center>
            <p class="h2" style="color: white;"> Control de Resumes</p>
        </center>
    </div>
    <div class="card-body">
        <p>En este espacio, podrás crear, actualizar y ver tus hojas de vida
            antes de enviarlas a cualquier solicitud de empleo de tu gusto.
        </p>
    </div>
</div>
@stop

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('resume.create') }}" class="btn btn-success">
                <i class="fa-solid fa-square-plus"></i>
                &nbsp;Crear
            </a>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-container" style="overflow-x: auto;">
                            <table id="resumes-table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-5">Información</th>
                                        <th class="col-md-3 d-none d-md-table-cell">Educación</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resumes as $resume)
                                        <tr>
                                            <td>{{ \Illuminate\Support\Str::limit($resume->info, 150, $end = '...') }}</td>
                                            <td class="col-md-3 d-none d-md-table-cell">{{ $resume->education }}</td>
                                            <td><img src="{{ asset("/$resume->photo") }}" alt="Foto del resumen"
                                                    style="max-width: 100px; max-height: 100px;"></td>
                                            <td>
                                                <a href="{{ route('resume.edit', ['id' => $resume->id]) }}"
                                                    class="btn btn-primary mb-2 mb-md-0 me-md-2">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                    &nbsp;Editar
                                                </a>
                                                <a href="{{ route('resume.pdf', ['id' => $resume->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="fa-brands fa-readme"></i>
                                                    &nbsp;Ver
                                                </a>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
