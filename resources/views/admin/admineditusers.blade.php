@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
    <div class="col-md-12" style="padding-top: 20px; padding-left: 20px;">
        <div class="col">
            <p class="h2">Editar Usuario</p>
        </div><!---->

        <div class="card">
            <div class="card-body text-dark ">
                <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Cambio de método a PUT -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Usuario</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Apellido del Usuario</label>
                        <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Número de Teléfono (####-####)</label>
                        <input type="text" class="form-control" name="phoneNumber" value="{{ $user->phoneNumber }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="role_id" class="form-label">Rol</label>
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->role_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger" name="action" value="update"
                            style="margin-right:5px">
                            <i class="bi bi-x-circle"></i>&nbsp;Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning"><i class="bi bi-floppy"></i>&nbsp;Bannear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
