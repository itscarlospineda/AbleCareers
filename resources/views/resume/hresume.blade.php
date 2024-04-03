@extends('adminlte::page')

@section('title', 'Vista de Resumes')

@section('content_header')
    <p class="h2"> Control de Resumes</p>
@stop

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<div class="card">
    <div class="card-body">
        <a href="{{ route('resume.create')}}" class="btn btn-success">
            <i class="fa-solid fa-square-plus"></i>
            &nbsp;Crear
        </a>
        <div class="table-responsive mt-3">
            <table id="resumes-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-md-5">Información</th>
                        <th class="col-md-3">Educación</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resumes as $resume)
                    <tr>
                        <td>{{ \Illuminate\Support\Str::limit($resume->info, 150, $end='...') }}</td>
                        <td>{{ $resume->education }}</td>
                        <td><img src="{{ asset("/$resume->photo") }}" alt="Foto del resumen" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('resume.edit', ['id' => $resume->id]) }}" class="btn btn-primary gy-2"> 
                                <i class="fa-solid fa-file-pen"></i>
                                &nbsp;Editar
                            </a>
                            <a href="{{ route('resume.pdf', ['id' => $resume->id]) }}" class="btn btn-info">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop