@extends('layouts.ceo')

@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Editar Nombre de Empresa</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos de categoria -->
            <form action="" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre de empresa:</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
                <a href="}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>


    </div>
@endsection
