@extends('adminlte::page')

@section('title', 'Listado de Empleados')

@section('content_header')
    <p class="h2">Listado de Usuarios</p>
@stop

@section('content')
<head>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="card" >
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped table-hover" id="example" style="width:100%">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Estado</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>

              @foreach ($users as $user)
              <tr>
                  <td class="fw-bold">{{ $user->id}}</td>
                  <td>{{ $user->name}}</td>
                  <td>{{ $user->lastName}}</td>
                  <td>{{$user->roles->first()->role_name}}</td>
                  <td>{{ $user->is_active}}</td>
                  <td>
                    <a href="{{route('admin.users.edit', ['id' => $user->id])}}"
                        class="btn btn-info">
                        <i class="fa-solid fa-user-pen"></i>
                        &nbsp;
                        Gestionar
                    </a>
                </td>
              </tr>
              @endforeach

          </tbody>
      </table>
      </div>
    </div>

</div>


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  <script>let table = new DataTable('#example');</script>

@endsection
