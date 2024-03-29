@extends('adminlte::page')

@section('title', 'AbleCareers - Detalles del Puesto')

@section('content')



    <div class="col-md-12" style="padding-top: 20px;">
      <div class="card">
          <div class="card-body">
            <a class="btn btn-danger float-right mr-2" style="background-color: red; color:white">Rechazar</a>
            <a class="btn btn-success float-right mr-2" style="background-color: limegreen; color:white">Aceptar</a>
         
          </div>
      </div>
  </div>
    </div>


@include('common.showresume')
@endsection
