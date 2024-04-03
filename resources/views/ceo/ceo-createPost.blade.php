@extends('adminlte::page')

@section('title', 'Create Post')


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
                        <form method="POST" action="{{ route('ceoJobPosition.store') }}" role="form"
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
                                <label for="title" class="form-label">Compañia: </label>
                                <button type="button" class="btn btn-secondary mx-4" disabled>{{strtoupper($companyName) }}</button>
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
