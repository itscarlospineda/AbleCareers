@extends('adminlte::page')

@section('title', 'Recruiter Home')


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

              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Post Date</th>
                            <th scope="col">Company ID</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($jobPositions as $jobPosition)
                        <tr>
                            <td class="fw-bold">{{ $jobPosition->id}}</td>
                            <td>{{ $jobPosition->name}}</td>
                            <td>{{ $jobPosition->description}}</td>
                            <td>{{ $jobPosition->post_date}}</td>
                            <td>{{ $jobPosition->company_id}}</td>
                            <td>
                                <!-- Botón de editar -->
                                <a href="{{ route('jobPosition.edit', ['id' => $jobPosition->id]) }}" class="btn btn-primary">Editar</a>
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


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

