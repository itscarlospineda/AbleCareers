@extends('layouts.common')

@section('content')
<div class="col">
    <h1>Homepage</h1> <br>
</div>
<div class="col">
    <center>
        <img src="/banner.jpg" class="front" alt="" srcset="" width="100%" height="auto">
        <h2> Somos la mejor opción para tu futuro!</h2>
        <p>Encuentra varias opciones de vacantes disponibles en la palma de tu mano.</p>
    </center>
</div>
<div class="container offers">
    <div class="row">
        <div class="col-lg">
            <div class="card card-body">
                <a href="#" class="nav-link font2 button">
                    <h5 class="card-title">Aplicantes</h5> 
                    <h4 class="card-text">7</h4>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <a href="#" class="nav-link font2 button">
                    <h5 class="card-title">Empresas Afiliadas</h5> 
                    <h4 class="card-text">3</h4>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-body">
                <a href="#" class="nav-link font2 button">
                    <h5 class="card-title">Vacantes Disponibles</h5> 
                    <h4 class="card-text">10</h4>
                </a>
            </div>
        </div>
    </div>
</div>   

<div class="offers">
    <center>
        <h1 style="margin-bottom: 30px;">Ofertas Recientes</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://storyunwritten.com/wp-content/uploads/2020/04/How-to-lead-a-meeting-2-1140x760.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption black d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://blogs.unitec.mx/hubfs/287524/Imported_Blog_Media/todo-sobre-ingenieria-industrial-por-que-la-elegi-3-compressor-Dec-17-2022-05-57-16-2825-PM.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption black d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://lanuevaserenidad.com/wp-content/uploads/2023/08/papel-de-la-farmacia-es-clave-en-la-prevencion-de-enfermedades-1140x760.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption black d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </center>
    
</div>

</div>
</div>       
</div>

@endsection