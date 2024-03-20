@extends('layouts.manager')

@section('content')
<head>

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="col">
    <section class="py-4">

        <div class="col">
                <h1>Administracion de Reclutadores</h1> <br>
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
                            <th scope="col">Nombre usuario</th>

                        
                            <th scope="col">ID compañia</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($companyUsers as $companyUser)
                        <tr>
                            <td class="fw-bold">{{ $companyUser->id}}</td>
                            <td>{{ $companyUser->user_id}}</td>
                             <td>{{ $companyUser->comp_id}}</td>
                              <!-- Cambiar Ruta-->
                                     <td>       <a href="" class="btn btn-outline-primary">Editar</a></td>

                            <td>
                            </td>
                        </tr>
                        @endforeach
                                           </tbody>
                </table>

                    <!-- Cambiar Ruta-->
         <button type="submit" class="btn btn-success">
                    <a href="#" style="color:white;">
                            <i class="bi bi-floppy"></i>&nbsp;Crear Reclutador
                    </a>
                        </button>

    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>

@endsection
