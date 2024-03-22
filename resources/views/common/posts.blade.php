@extends('adminlte::page')

@section('title', 'AbleCareers - Browse Posts')

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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="bi bi-plus-circle"></i>&nbsp;Aplicar
                        </a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Ventana Emergente Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona un Currículum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Lista de Currículums -->
        <table class="table">
          <thead>
            <tr>
              <th>Información</th>
              <th>Foto</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($resumes as $resume)
            <tr>
              <td>{{ $resume->info }}</td>
              <td><img src="{{ asset($resume->photo) }}" alt="Foto del resumen" style="max-width: 100px; max-height: 100px;"></td>
              <td>
                <form action="{{ route('jobpositions.apply') }}" method="POST">
                  @csrf
                  <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                  <input type="hidden" name="job_position_id" value="{{ $jobPos->id }}"> <!-- Aquí deberías usar el ID del trabajo del bucle de los resúmenes -->
                  <button type="submit" class="btn btn-success apply-button" data-jobid="{{ $jobPos->id }}">Seleccionar</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Cambiar el color del botón al hacer clic
$(document).ready(function() {
    $('.apply-button').click(function() {
        var jobId = $(this).data('jobid');
        $(this).removeClass('btn-primary').addClass('btn-secondary').text('Aplicado');
    });
});
</script>
@endsection
