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
<script>
    am5.ready(function () {
  
      // Create root element
      var root = am5.Root.new("chartdiv");
  
      // Set themes
      root.setThemes([
        am5themes_Animated.new(root)
      ]);
  
      // Create chart
      var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
          endAngle: 270
        })
      );
  
      // Create series
      var series = chart.series.push(
        am5percent.PieSeries.new(root, {
          valueField: "value",
          categoryField: "category",
          endAngle: 270
        })
      );
  
      series.states.create("hidden", {
        endAngle: -90
      });
  
      // Set data
      series.data.setAll([{
        category: "Soporte Técnico",
        value: 10
      }, {
        category: "Dev FrontEnd",
        value: 15
      }, {
        category: "Dev Backend",
        value: 8
      }]);
  
      series.appear(1000, 100);
  
    }); // end am5.ready()
  </script>

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
</div>

@endsection
