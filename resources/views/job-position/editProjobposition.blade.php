@extends('adminlte::page')

@section('title', 'Editar Perfil')


@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Editar Perfil</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos del perfil de RECLUTADOR -->
            <form action="{{ route('jobPosition.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $recruiter->name }}">
                    <label for="lastName">Apellido</label>

                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                        value="{{ $recruiter->phoneNumber }}">
                    <label for="email">Correo</label>

                    <input type="text" class="form-control" id="lastName" name="lastName"
                        value="{{ $recruiter->lastName }}">
                    <label for="phoneNumber">Telefono</label>

                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ $recruiter->email }}">
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

            </form>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
