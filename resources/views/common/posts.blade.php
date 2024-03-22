@extends('adminlte::page')

@section('title', 'AbleCareers - Browse Posts')

@section('content')
<!--PENDIENTE FOREACH AJUSTES-->
            <div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
                <div class="col">
                    <p class="h1">Posts</p>
                </div>
        
                @foreach ($jobPosition as $jobPosition)
                <div class="col" style="padding-top: 20px;">
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/data_analysis.jpg" alt="" srcset="" height="100px" width="155px">
                                </div>
                                <div class="col-md-8">
                                    <p class="h5">{{$jobPosition->name}}</p>
                                    <p class="text-primary">Fecha y Hora de Publicación: {{$jobPosition->post_date}}</p> <hr>
                                    <p class="card-text"> 
                                        {{ \Illuminate\Support\Str::limit($jobPosition->description, 50, $end='...') }}
                                    </p>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <a href="{{ route('common.postread',['id'=>$jobPosition->id])}}" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i>&nbsp;Ver más 
                                    </a>
                                    <a href="" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i>&nbsp;Aplicar
                                    </a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col" style="padding-top: 20px;">
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/data_analysis.jpg" alt="" srcset="" height="100px" width="155px">
                                </div>
                                <div class="col-md-8">
                                    <p class="h5">Solicitud de Analista de Datos</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit odio pariatur culpa quisquam doloribus. Nobis possimus distinctio illum, voluptatem temporibus quisquam fugiat quam. Labore cumque ullam quia at dolores ipsum.</p>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <a href="" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i>&nbsp;Ver más 
                                    </a>
                                    <a href="" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i>&nbsp;Aplicar
                                    </a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
        </div>
    </div>       
</div>

@endsection