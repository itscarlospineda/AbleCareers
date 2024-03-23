@extends('layouts.ceo')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h1">Posts</p>
    </div>

    @foreach ($jobPositions as $jobPos)
    <div class="col" style="padding-top: 20px;">
        <div class="card border-dark">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="/data_analysis.jpg" alt="" srcset="" height="100px" width="155px">
                    </div>
                    <div class="col-md-8">
                        <p class="h5">{{$jobPos->name}}</p>
                        <p class="text-primary">Fecha y Hora de Publicación: {{$jobPos->post_date}}</p> <hr>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($jobPos->description, 50, $end='...') }}</p>
                    </div>
                    <div class="col-md-2 align-self-center">
                        <a href="{{ route('jobpositions.showdetails', ['id' => $jobPos->id]) }}" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i>&nbsp;Ver más
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
