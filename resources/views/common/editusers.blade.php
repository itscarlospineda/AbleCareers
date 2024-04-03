@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 20px;">
    <div class="col">
        <p class="h2">Editar Perfil de Usuario</p>
    </div>

    <div class="card">
        <div class="card-body text-dark ">
            <form action="{{ route('postulant.updateprofile') }}" method="POST">
                @csrf
                @method('PUT') <!-- Cambio de método a PUT -->

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Usuario</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellido del Usuario</label>
                    <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}">
                </div>
                
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Número de Teléfono (####-####)</label>
                    <input type="text" class="form-control" name="phoneNumber" value="{{ $user->phoneNumber }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="oldPassword">Clave Anterior</label>
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" value="">
                </div>
                <div class="mb-3">
                    <label for="newPassword">Clave Nueva</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" value="">
                </div>
                <div class="mb-3">
                    <label for="confirmNewPassword">Confirmar Clave Nueva</label>
                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" value="">
                </div>

                <div class="d-md-flex justify-content-md-end">
                    <a href="{{ route('postulant.postulanthome') }}" class="btn btn-danger" name="action" value="update" style="margin-right:5px">
                        <i class="bi bi-x-circle"></i>&nbsp;Cancelar
                    </a>
                    <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i>&nbsp;Actualizar</button>       
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
