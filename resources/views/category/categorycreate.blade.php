@extends('layouts.admin')

@section('content')
<head>

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
</head>

<div class="col">
    <section class="py-4">

      <div class="col py-4">
                <h1>Creacion de categorias</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    <form action="{{ route('admin.category.store')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre de categoria</label>
                            <input type="text" class="form-control" name="name">
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

    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  <script>let table = new DataTable('#example');</script>

@endsection


