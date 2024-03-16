@extends('layouts.common')

@section('content')
<div class="col">
    <h1>Editar Resumen</h1>
    <br>

    <!-- Formulario para actualizar los datos del resumen -->
    <form action="{{ route('resume.update_or_destroy', $resume->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="info">Información:</label>
            <input type="text" class="form-control" id="info" name="info" value="{{ $resume->info }}">
        </div>
        <div class="form-group">
            <label for="education">Educación:</label>
            <input type="text" class="form-control" id="education" name="education" value="{{ $resume->education }}">
        </div>
        <div class="form-group">
            <label for="work_experience">Experiencia laboral:</label>
            <input type="text" class="form-control" id="work_experience" name="work_experience" value="{{ $resume->work_experience }}">
        </div>
        <div class="form-group">
            <label for="extra">Extra:</label>
            <input type="text" class="form-control" id="extra" name="extra" value="{{ $resume->extra }}">
        </div>
        <div class="form-group">
            <label for="reference">Referencia:</label>
            <input type="text" class="form-control" id="reference" name="reference" value="{{ $resume->reference }}">
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="photo">Foto:</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
        <button type="submit" class="btn btn-danger" name="action" value="destroy">Eliminar</button>

        <a href="{{ route('resume.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
