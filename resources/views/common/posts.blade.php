@extends('adminlte::page')

@section('title', 'AbleCareers - Browse Posts')

@section('content')
<div class="col-md-12 mt-2" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h1">Posts</p>
        <p class="h5">Encuentra variedad de plazas vacantes en esta página.</p>
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
                        @if ($jobPos->isAppliedByUser(auth()->id()))
                            <button class="btn btn-primary" disabled>Aplicando</button>
                            <span class="text-success">¡🎊🎊 Has aplicado a esta posición 🎊🎊!</span>
                        @endif
                    </div>
                </div>  
            </div>
        </div>
    </div>
    @endforeach
</div>



@endsection

@section('js')
<script>
  $(document).ready(function(){
      var selectedJobId; // Variable para almacenar el ID de la posición de trabajo seleccionada

      $('.apply-button').click(function(){
          selectedJobId = $(this).data('jobid'); // Almacenar el ID de la posición de trabajo seleccionada
          $('#job_position_id').val(selectedJobId); // Asignar el valor al campo oculto job_position_id
      });
  });
</script>
@endsection
