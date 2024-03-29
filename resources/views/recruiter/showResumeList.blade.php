@extends('adminlte::page')

@section('title', 'AbleCareers - Detalles del Puesto')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <p class="h1">Applicant list</p>
        </div>
    </div>
    <div class="row">
        @foreach ($jobPositions as $jopoResume)
        <div class="col-md-12" style="padding-top: 20px;">
            <div class="card border-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/resumePic.png') }}"  class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <p class="h5">Alexandra Caballero</p>
                            <hr>
                            <a href="{{ route('resume.pdfShowRecruiter', ['id' => $jopoResume->resume_id]) }}" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i>&nbsp;Ver Hoja de vida
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
