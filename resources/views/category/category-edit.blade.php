@extends('layouts.admin')

@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Editar Categoria</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos de categoria -->
            <form action="{{ route('admin.category.update_or_destroy', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
                <button type="submit" class="btn btn-danger" name="action" value="destroy">Eliminar</button>
                <a href="{{route('admin.category.index')}}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>


    </div>
@endsection
