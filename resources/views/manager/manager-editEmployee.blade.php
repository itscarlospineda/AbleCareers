@extends('adminlte::page')

@section('title', 'Editar Empleado')


@section('content')

    <head>

        <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    </head>

    <div class="col">
        <section class="py-4">

            <div class="col py-4">
                <h1>Editar Empleado</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    <form action="{{ route('manager.employee.update_or_destroy', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $employee->user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                value="{{ $employee->user->lastName }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"
                                value="{{ $employee->user->phoneNumber }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ $employee->user->email }}">
                        </div>

                        <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input custom-control-input-success"
                                    id="resetPassword" name="resetPassword">
                                <label for="resetPassword" class="custom-control-label">Reestablecer Clave</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="action" value="update">
                            <i class="fa-solid fa-pen"></i>
                            &nbsp;
                            Actualizar
                        </button>
                        <button type="submit" class="btn btn-danger" name="action" value="destroy">
                            <i class="fa-solid fa-user-xmark"></i>
                            &nbsp;
                            Eliminar
                        </button>
                        <a href="{{ route('manager.showEmployees') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark"></i>
                            &nbsp;
                            Cancelar
                        </a>

                    </form>
                </div>
            </div>
    </div>
    </div>
    </div>

    </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#example');
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
