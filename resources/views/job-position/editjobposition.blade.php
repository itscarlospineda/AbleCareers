@extends('adminlte::page')

@section('title', 'Postulant Home')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Posicion de trabajo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('jobPosition.update_or_destroy', $jobPosition->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{--  @method('PUT') --}}
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Puesto</label>
                                <input type="text" class="form-control" name="jobpo_name" value="{{ $jobPosition->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="jobpo_desc" value="{{ $jobPosition->description }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="jobpo_date" value="{{ substr($jobPosition->post_date, 0, 10) }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Compania</label>
                                <input type="text" class="form-control" name="jobpo_company" value="{{ $jobPosition->company_id }}">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="active" {{ $jobPosition->is_active === 'ACTIVE' ? 'checked' : 'INACTIVO' }}>
                                <label class="form-check-label" for="active">Activo</label>
                            </div>
                            


                            <a href="{{route('jobPosition.index')}}" class="btn btn-danger">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>
                        </form>
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
