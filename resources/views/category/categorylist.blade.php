@extends('adminlte::page')

@section('content')
<head>

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="col">
    <section class="py-4">

        <div class="col">
                <h1>Administracion de Categorias</h1> <br>
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
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td class="fw-bold">{{ $category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    Editar
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">
                    <a href="{{ route('admin.category.create') }}" style="color:white;">
                            <i class="fa-solid fa-square-plus"></i>&nbsp;Crear Categoria
                    </a>
                        </button>
                </div>
              </div>

    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>

@endsection
