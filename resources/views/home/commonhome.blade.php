@extends('layouts.common')

@section('content')
<div class="col">
    <h1>Homepage</h1> <br>
</div>
<div class="col">
    <center>
        <img src="/banner.jpg" class="front" alt="" srcset="" width="100%" height="auto">
        <h2> ¡Somos la mejor opción para tu futuro!</h2>
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

    <!--<div class="row py-3">
      <div class="col">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                        <a href="/user/create/request" class="nav-link font2 button">
                          <h5 class="card-title">¿Eres dueño o administrador de una empresa?</h5> <br><br><br>
                          <p class="card-text">Puedes aplicar a ser parte de nuestra red de empresas y contar con mayores beneficios.</p>
                          <p class="card-text">Haz clic aquí para aplicar.</p>
                        </a>
                      </div>
                      <div class="col-sm-6 text-right">
                        <img src="https://www.pascualparada.com/wp-content/uploads/2013/03/empresasRed.jpg" 
                        class="card-img-right" alt="red-img">
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>-->

    <div class="container my-5">
      <div class="card row flex-row-reverse" style="background-color: white">
          <img class="col-lg-4 card-img-end img-fluid p-0" src="https://media.geeksforgeeks.org/wp-content/uploads/20230420093202/Internet-image-(2).webp" 
            width="200px" height="200px"/>
          <div class="col-lg-8 card-body">
              <h1 class="card-title">¿Eres dueño o administrador de una empresa?</h1> <br>
              <p class="card-text">Puedes aplicar a ser parte de nuestra red de empresas y contar con mayores beneficios. 
                Haz clic aquí para aplicar.</p> <br>
              <a href="/user/create/request" class="btn btn-danger"> <i class="bi bi-building-up"></i>&nbsp;Aplicar</a>
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