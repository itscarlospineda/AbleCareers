@extends('layouts.admin')

@section('content')
<head>

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="col">
    <section class="py-4">

        <div class="col">
                <h1>Registro de Usuarios</h1> <br>
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Activo</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                        <tr>
                            <td class="fw-bold">{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->lname}}</td>
                            <td>{{ $user->phone}}</td>
                            <td>{{ $user->mail}}</td>
                            <td>{{ $user->is_active}}</td>
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