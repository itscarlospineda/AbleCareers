@extends('adminlte::page')

@section('title', 'Postulant Home')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Vacante</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('jobPosition.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Puesto</label>
                                <input type="text" class="form-control" name="jobpo_name">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="jobpo_desc">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Compañia</label>
                                <select name="jobpo_company" id="jobpo_company" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected>Escoja la compañia</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->comp_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-floppy"></i>&nbsp;Guardar
                            </button>

                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
