@php
    use App\Models\JopoResume;
@endphp

@extends('adminlte::page')

@section('title', 'Búsqueda de Posts')

@section('content_header')
<div class="card">
    <div class="card-header bg-success">
        <center>
            <p class="h2" style="color: white;"> Postulaciones de Empresas</p>
        </center>
    </div>
    <div class="card-body">
        <p>Encuentra variedad de plazas vacantes en esta página.</p>
    </div>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        @foreach ($jobPositions as $jobPos)
                <div class="card my-4" style="border: 0.3px solid #000000;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="" alt="" srcset="" height="100px" width="155px">
                            </div>
                            <div class="col-md-7">
                                <p class="h5">{{ $jobPos->name }}</p>
                                @if ($jobPos->company)
                                    <p class="text-dark">Empresa: {{ $jobPos->company->comp_name }}</p>
                                @else
                                    <p class="text-dark">Empresa: No especificada</p>
                                @endif
                                <p class="text-primary">Fecha y Hora de Publicación: {{ $jobPos->post_date }}</p> <hr>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($jobPos->description, 50, $end='...') }}</p>
                            </div>
                            <div class="col-md-3 align-self-center">
                                <a href="{{ route('jobpositions.showdetails', ['id' => $jobPos->id]) }}" class="btn btn-success">
                                    <i class="fa-solid fa-square-plus"></i>
                                    &nbsp;
                                    Ver más
                                </a>
                                @if (JopoResume::whereHas('resume', function ($query) {
                                    $query->where('user_id', auth()->id());
                                })->where('job_position_id', $jobPos->id)->exists())
                                    <button class="btn btn-primary" disabled>Aplicando</button>
                                    <br>
                                    <span class="text-success"> <br>
                                        <i class="fa-solid fa-building-circle-check"></i> 
                                        &nbsp; 
                                        Ya has aplicado a esta posición
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>

    

@endsection
