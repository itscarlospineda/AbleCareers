@extends('layouts.admin')

@section('content')
<head>

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="col">
    <section class="py-4">

        <div class="col">
                <h1>Solicitudes de Empresas</h1> <br>
        </div>

      <div class="container">

          <div class="card border-dark" >
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
                            <th scope="col">ID</th>
                            <th scope="col">Información</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($userRequests as $user_request)
                        <tr>
                            <td class="fw-bold">{{ $user_request->id}}</td>
                            <td>{{ $user_request->info}}</td>
                            <td>{{ $user_request->status}}</td>
                            <td>
                                <a href="#" class="btn btn-success">
                                    <i class="bi bi-floppy"></i>&nbsp;Aceptar
                                </a> <!-- Post para cambiar tipo de user?-->

                                <a href="#" class="btn btn-danger">
                                    <i class="bi bi-x-circle"></i>&nbsp;Cancelar
                                </a> <!-- Eliminar?-->
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
              </div>

          </div>
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  <script>let table = new DataTable('#example');</script>

@endsection
