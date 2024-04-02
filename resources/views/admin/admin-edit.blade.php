@extends('adminlte::page')

@section('title', 'Editar Perfil')


@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Editar Perfil</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos de CEO -->
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    <label for="lastName">Apellido</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $user->lastName }}">
                    <label for="phoneNumber">Telefono</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                        value="{{ $user->phoneNumber }}">
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    <label for="oldPassword">Clave Anterior</label>
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" value="">
                    <label for="newPassword">Clave Nueva</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" value="">
                    <label for="confirmNewPassword">Confirme clave Nueva</label>
                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword"
                        value="">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="action" value="update">
                    <i class="fa-solid fa-pen"></i>
                    &nbsp;
                    Actualizar
                </button>
                <a href="{{ route('admin.adminhome') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i>
                    &nbsp;
                    Cancelar
                </a>
            </form>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
