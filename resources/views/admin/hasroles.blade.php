@extends('layouts.admin')

@section('content')
    <div class="col">
        <h1>Asignación de Roles</h1> <br>
    </div>

    <div class="col">
        <div class="card-body text-dark ">

            <form action="{{ route('createhasroles.create') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">Número de Usuario</label>
                    <select name="user_id" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Número de Rol</label>
                    <select name="role_id" class="form-control">
                        <option value="1">Usuario Común</option>
                        <option value="2">Reclutador</option>
                        <option value="3">Manager</option>
                        <option value="4">CEO</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-floppy"></i>&nbsp;Guardar
                </button>

            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
