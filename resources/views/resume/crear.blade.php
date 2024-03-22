@extends('adminlte::page')

@section('title', 'AbleCareers - Crear Resume')

@section('content')
<div class="col">
    <p class="h1">Nuevo Resume</p>
    <br>
    
    <!-- Formulario para capturar los datos del resumen -->
    <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="info">Información:</label>
            <input type="text" class="form-control" id="info" name="info" placeholder="Ingrese información">
        </div>
        <div class="form-group">
            <label for="education">Educación:</label>
            <input type="text" class="form-control" id="education" name="education" placeholder="Ingrese educación">
        </div>
        <div class="form-group">
            <label for="work_experience">Experiencia laboral:</label>
            <input type="text" class="form-control" id="work_experience" name="work_experience" placeholder="Ingrese experiencia laboral">
        </div>
        <div class="form-group">
            <label for="extra">Extra:</label>
            <input type="text" class="form-control" id="extra" name="extra" placeholder="Ingrese información extra">
        </div>
        <div class="form-group">
            <label for="reference">Referencia:</label>
            <input type="text" class="form-control" id="reference" name="reference" placeholder="Ingrese referencia">
        </div>
        <div class="form-group">
            <label for="photo">Foto:</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('resume.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop