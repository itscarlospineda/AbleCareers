@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Job Position
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Posicion de trabajo</span>
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

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-floppy"></i>&nbsp;Guardar
                            </button>

                            {{-- @include('job-position.form') --}}
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
@endsection
