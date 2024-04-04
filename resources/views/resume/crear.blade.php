@extends('adminlte::page')

@section('title', 'Crear Resume')

@section('content_header')
<div class="card-header bg-success">
    <center>
        <p class="h2" style="color: white;">Crear Nuevo Resume</p>
    </center>
</div>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <!-- Formulario para capturar los datos del resumen -->
            <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="info">Información General del Postulante:</label>
                    <textarea style="height: 100px; resize:none" name="info" class="form-control" placeholder="Ingrese información"></textarea>
                </div>

        <hr> <br>
        <p class="h3">Sección de Educación</p> <br>
        <div class="form-group">
            <label for="education">Lugar de Educación #1:</label>
            <input type="text" class="form-control" id="education" name="education" placeholder="Ingrese lugar de educación">
        </div>
        <div class="form-group">
            <label for="education_years">Título y Años (####-####) de Educación #1:</label>
            <input type="text" class="form-control" id="education_years" name="education_years" placeholder="Ingrese título y tiempo de estudio">
        </div>
        <div class="form-group">
            <label for="education_pos">Descripción de Educación #1:</label>
            <textarea style="height: 70px; resize:none" name="education_pos" class="form-control" placeholder="Ingrese una breve descripción"></textarea>
        </div>

                <div class="form-group">
                    <label for="education_two">Lugar de Educación #2:</label>
                    <input type="text" class="form-control" id="education_two" name="education_two"
                        placeholder="Ingrese lugar de educación">
                </div>
                <div class="form-group">
                    <label for="education_two_years">Título y Años (####-####) de Educación #2:</label>
                    <input type="text" class="form-control" id="education_two_years" name="education_two_years"
                        placeholder="Ingrese título y tiempo de estudio">
                </div>
                <div class="form-group">
                    <label for="education_two_pos">Descripción de Educación #2:</label>
                    <textarea style="height: 70px; resize:none" name="education_two_pos" class="form-control"
                        placeholder="Ingrese una breve descripción"></textarea>
                </div>

        <hr>
        <p class="h3">Experiencia Laboral</p>
        <div class="form-group">
            <label for="work_experience">Lugar de Trabajo #1:</label>
            <input type="text" class="form-control" id="work_experience" name="work_experience" placeholder="Ingrese experiencia laboral">
        </div>
        <div class="form-group">
            <label for="work_years">Puesto Asignado y Años Laborados #1:</label>
            <input type="text" class="form-control" id="work_years" name="work_years" placeholder="Ingrese rol y años de experiencia laboral">
        </div>
        <div class="form-group">
            <label for="work_pos">Descripción de Trabajo #1:</label>
            <textarea style="height: 70px; resize:none" name="work_pos" class="form-control" placeholder="Ingrese breve información de su puesto laboral"></textarea>
        </div>
        <div class="form-group">
            <label for="work_two_experience">Lugar de Trabajo #2:</label>
            <input type="text" class="form-control" id="work_two_experience" name="work_two_experience" placeholder="Ingrese experiencia laboral">
        </div>
        <div class="form-group">
            <label for="work_two_years">Puesto Asignado y Años Laborados #2:</label>
            <input type="text" class="form-control" id="work_two_years" name="work_two_years" placeholder="Ingrese rol y años de experiencia laboral">
        </div>
        <div class="form-group">
            <label for="work_two_pos">Descripción de Trabajo #2:</label>
            <textarea style="height: 70px; resize:none" name="work_two_pos" class="form-control" placeholder="Ingrese breve información de su puesto laboral"></textarea>
        </div>


        <hr>
        <p class="h3">Sección de Información Adicional</p>

                <div class="form-group">
                    <label for="extra">Extra:</label>
                    <input type="text" class="form-control" id="extra" name="extra"
                        placeholder="Ingrese información adicional">
                </div>
                <div class="form-group">
                    <label for="reference">Referencia Personal #1:</label>
                    <input type="text" class="form-control" id="reference" name="reference"
                        placeholder="Ingrese nombre y apellido de referencia">
                </div>
                <div class="form-group">
                    <label for="reference_num">Número de Referencia (####-####) #1:</label>
                    <input type="text" class="form-control" id="reference_num" name="reference_num"
                        placeholder="Ingrese número de celular de referencia">
                </div>
                <div class="form-group">
                    <label for="reference_two">Referencia Personal #2:</label>
                    <input type="text" class="form-control" id="reference_two" name="reference_two"
                        placeholder="Ingrese nombre y apellido de referencia">
                </div>
                <div class="form-group">
                    <label for="reference_two_num">Número de Referencia (####-####) #2:</label>
                    <input type="text" class="form-control" id="reference_two_num" name="reference_two_num"
                        placeholder="Ingrese número de celular de referencia">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
