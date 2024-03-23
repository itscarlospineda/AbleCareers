@extends('adminlte::page')

@section('title', 'AbleCareers - Vista de Resumes')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="{{ route('resume.create')}}" class="btn btn-outline-success">Crear</a>
<div class="table-responsive mt-3">
    <table id="resumes-table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Información</th>
                <th>Educación</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resumes as $resume)
            <tr>
                <td>{{ $resume->info }}</td>
                <td>{{ $resume->education }}</td>
                <td><img src="{{ asset("/$resume->photo") }}" alt="Foto del resumen" style="max-width: 100px; max-height: 100px;">
                </td>
                <td>
                    <a href="{{ route('resume.edit', ['id' => $resume->id]) }}" class="btn btn-outline-primary">Editar</a>
                    <a href="{{ route('resume.pdf', ['id' => $resume->id]) }}" class="btn btn-outline-info">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop