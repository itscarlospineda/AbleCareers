@extends('adminlte::page')

@section('title', 'Editar Perfil')


@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Modificar Usuario (CEO)</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos de categoria -->
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre de CEO</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    <label for="name">Apellido</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    <label for="name">Telefono</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    <label for="name">Correo</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    <label for="name">Clave</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
                <button type="submit" class="btn btn-danger" name="action" value="destroy">Eliminar</button>
                <a href="}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
