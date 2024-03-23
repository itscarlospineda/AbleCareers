@extends('adminlte::page')

@section('title', 'AbleCareers - Detalles del Puesto')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h1">Detalles del Puesto</p>
    </div>

    <div class="card border-dark">
        <div class="card-body">
            <p class="h5">{{ $jobPosition->name }}</p>
            <p class="text-primary">Fecha y Hora de Publicación: {{ $jobPosition->post_date }}</p>
            <hr>
            <p>{{ $jobPosition->description }}</p>
        </div>
    </div>
</div>
@endsection
