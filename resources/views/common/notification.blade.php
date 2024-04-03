@extends('adminlte::page')

@section('title', 'Búsqueda de Posts')

@section('content')

<div class="row">
  <div class="col-md-12 mt-2">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Listado de Notificaciones</h3>
          </div>
          <div class="card-body">
              <ul class="list-group">
                  @foreach($notificaciones as $notificacion)
                      <li class="list-group-item">
                          <div class="d-flex justify-content-between align-items-center" onclick="toggleComment(this)" style="cursor: pointer;">
                              <div class="d-flex align-items-center">
                                  <div>
                                      <p class="mb-0" style="font-size: 18px; color: midnightblue; font-weight: bold;">{{$notificacion->job_position_name}}</p>
                                      <p class="text-muted mb-0"><i class="far fa-clock"></i> {{$notificacion->created_at}}</p>
                                      <div class="notification-body" style="display: none;">{{ $notificacion->comentario }}</div>
                                  </div>
                              </div>
                              <div class="ml-auto">
                                  <span style="font-size: 18px; color: darkblue;">&vellip;</span>
                              </div>
                          </div>
                      </li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
</div>

<script>
    function toggleComment(element) {
        var comment = element.querySelector('.notification-body');
        comment.style.display = (comment.style.display === 'none' || comment.style.display === '') ? 'block' : 'none';
    }
</script>

@endsection
