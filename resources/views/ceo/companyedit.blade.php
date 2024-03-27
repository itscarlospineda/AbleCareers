@extends('adminlte::page')

@section('title', 'Editar Compañia')


@section('content')
    <div class="mt-3 card">
        <h1 class="card-header">Modificar Company</h1>

        <div class="card-body">
            <!-- Formulario para actualizar los datos de categoria -->
            <form action="{{ route('ceo.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre de Empresa</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $company->comp_name }}">
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ $company->comp_mail }}">
                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $company->comp_phone }}">
                    <label for="city">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city"
                        value="{{ $company->comp_city }}">
                    <label for="name">Departamento</label>
                    <input type="text" class="form-control" id="depart" name="depart"
                        value="{{ $company->comp_depart }}">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" name="action" value="update">
                    <i class="fa-solid fa-pen"></i>
                    &nbsp;
                    Actualizar
                </button>
                <a href="{{ route('ceo.ceohome') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i>
                    &nbsp;
                    Cancelar
                </a>
            </form>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
