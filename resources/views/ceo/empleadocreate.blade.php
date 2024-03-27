@extends('adminlte::page')

@section('title', 'Crear Empleado')


@section('content')

    <head>

        <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    </head>

    <div class="col">
        <section class="py-4">

            <div class="col py-4">
                <h1>Creacion de Empleados</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="lastName" id="lastName">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Rol</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i>&emsp;Guardar Empleado
                        </button>

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
