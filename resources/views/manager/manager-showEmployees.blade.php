@extends('adminlte::page')

@section('title', 'Empleados')


@section('content')


    <head>

        <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    </head>

    <div class="col">
        <section class="py-4">

            <div class="col">
                <h1>Administracion de Empleados</h1> <br>
            </div>

            <div class="container">

                <div class="card border-dark">
                    <!--<div class="card-header"><h5 class="card-title">Solicitudes de Empresa</h5></div>

                                                  <div class="container mt-3">
                                                        <a class="btn btn-success col-auto" href="/createcategories">
                                                            <i class="bi bi-journal-arrow-up"></i>&nbsp;Crear Nuevo</a>
                                                  </div>-->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Nombre Del Empleado</th>
                                        <th scope="col">Rol Del Empleado</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activeCompanyRecruiters as $companyUser)
                                        <tr>
                                            <td class="fw-bold">{{ $companyUser->id }}</td>
                                            <td>{{ $companyUser->user->name }} {{$companyUser->user->lastName}}</td>
                                            @foreach ($companyUser->user->roles as $role)
                                                <td>{{ $role->role_name }}</td>
                                            @endforeach
                                            <!-- Cambiar Ruta-->
                                            <td>
                                                <a href="{{ route('manager.employee.edit', ['id' => $companyUser->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                    &nbsp;
                                                    Gestionar
                                                </a>
                                            </td>

                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>



        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
