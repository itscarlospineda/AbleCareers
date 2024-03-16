@extends('layouts.common')

@section('content')
<a href="{{ route('resume.create')}}">Crear</a>
<div class="table-responsive">
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
                    <a href="{{ route('resume.pdf', ['id' => $resume->id]) }}" class="btn btn-outline-primary">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
