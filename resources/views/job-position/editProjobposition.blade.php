@extends('layouts.recruiter')

@section('template_title')
    {{ __('Update') }} Job Position
@endsection

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
                                <input type="text" class="form-control" name="jobpo_name">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="jobpo_desc">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="jobpo_date">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Compania</label>
                                <input type="text" class="form-control" name="jobpo_company">
                            </div>

                           {{--  @include('job-position.form') --}}

                            <a href="{{route('jobPosition.index')}}" class="btn btn-danger">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="action" value="update">Actualizar</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
