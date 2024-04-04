@extends('adminlte::page')

@section('title', 'AbleCareers - Detalles del Puesto')

@section('content')

<!-- Styles -->
<style>
  #chartdiv {
    width: 100%;
    height: 450px;
  }

  .chart-card {
    margin-top: 20px;
  }

  .filter-bar {
    background-color: #007bff;
    color: white;
    height: 100%;
    width: 220px; /* Aumentar el ancho */
    float: right;
    padding: 10px;
    margin-right: -10px; /* Eliminar el margen */
  }

  .filter-item {
    margin-bottom: 10px;
  }

  .filter-select {
    width: 100%;
  }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<p class="h1 m-0 card-header">BIENVENIDO </p>

<div class="card card-success">
  <div class="card-header" style="display:grid">
    <p class="h1 card-title">Solicitudes de Postulantes Por Categorias</p>
    <div class="text-center">
      <a href="{{ route('jobPosition.recruiterShowPost') }}">
         Administrar
          <i class="fa-solid fa-arrow-circle-right"></i>
      </a>
  </div>
</div>



    <div class="card-body">
      @foreach($postulantes as $postulanteXCategoria)
        <div class="small-box bg-warning">
            <div class="inner">
            
                
                <h3>{{ $postulanteXCategoria-> amount }}  </h3>
                <p>{{ $postulanteXCategoria-> category }} </p>
              </div>
            <div class="icon">
                <i class="fa-solid fa-user-group"></i>
            </div>
         
        </div>
        @endforeach
    </div>
</div>

<div class="card card-success">
  <div class="card-header">
      <p class="h1 card-title">Total de Plazas Disponibles</p>
  </div>

  <div class="card-body">


  <div class="small-box bg-info">
    <div class="inner">
        <h3>{{ $postsCount }}</h3>
        <p>Posts Creados</p>
    </div>
    <div class="icon">
        <i class="fa-solid fa-address-book"></i>
    </div>
    <a href="{{ route('jobPosition.index') }}" class="small-box-footer">
        Administrar
        <i class="fa-solid fa-arrow-circle-right"></i>
    </a>
</div>
</div>
</div>

</div>

{{--
<!-- HTML -->
<div class="row">
  <div class="col-md-8">
    <div class="card chart-card">
      <div class="card-body">
        <div id="chartdiv"></div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mr-0">
    <div class="card filter-bar">
      <div class="filter-item">
        <select class="form-control filter-select">
          <option>Opción 1</option>
          <option>Opción 2</option>
          <option>Opción 3</option>
        </select>
      </div>
      <div class="filter-item">
        <select class="form-control filter-select">
          <option>Opción 1</option>
          <option>Opción 2</option>
          <option>Opción 3</option>
        </select>
      </div>
      <div class="filter-item">
        <select class="form-control filter-select">
          <option>Opción 1</option>
          <option>Opción 2</option>
          <option>Opción 3</option>
        </select>
      </div>
    </div>
  </div>
</div>  --}}

@endsection
