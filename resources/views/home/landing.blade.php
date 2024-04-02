
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbleCareers | Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="landing.css">
</head>
<body>

    <!--SECCION 1: NAVBAR PRINCIPAL -->
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light mainbar d-flex justify-content-between align-items-center fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center ms-3" href="{{route('landing')}}">
                    <img src="vendor\adminlte\dist\img\AbleCareersLogo.png" alt="" srcset="" width="50px" height="50px">
                    <p class="h3 fw-bold m-0 ms-2">AbleCareers</p>
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center text-center mx-auto">
                        <li class="nav-item mx-2">
                            <a class="nav-link navBtn" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link navBtn" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link navBtn" href="#posts">Posts Recientes</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link navBtn" href="#aboutUs">Acerca de Nosotros</a>
                        </li>
                </ul>
                <div class="d-flex">
                    <ul class="nav me-5">
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link fw-bold authBtn me-2">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link fw-bold authBtn">Register</a></li>
                    </ul>
                </div>
              </div>
            </div>
        </nav>
    </div>

    <!--SECCION 2: HERO SECTION -->
    <div class="container-fluid mt-5 pt-5 hero black">
        <div class="row mt-4 pt-4">
            <div class="col-md-6">
                <div class="mx-5 my-2">
                    <p class="display-5">Bienvenido a <span class="display-4 fw-bold">AbleCareers</span></p><hr>
                    <p>Somos la plataforma por excelencia de networking en toda la nación.
                        Encuentra ofertas de empleo, forma alianzas y conéctate en el mejor lugar para 
                        expandir tu futuro profesional.</p> <br>
                    <div>
                        <center>
                            <a href="{{ route('register') }}" class="btn px-4 joinbtn">¡Únete ya!</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mx-5 mb-4">
                    <img src="vendor\adminlte\dist\img\think2-nobg.png" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="row mt-3" id="servicios">
        </div>
    </div>
    
    <!--SECCION 3: SERVICIOS Y DESC -->
    <div class="container black my-4 py-4">
        <div class="row py-4">
            <center>
                <p class="h2">Nuestros Servicios</p>
            </center>
        </div>
        <div class="row gy-4">
            <!--TARJETITA #1-->
            <div class="col-md-4">
                <div class="card border-dark">
                    <div class="card-body">
                        <p class="card-title">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success joinBtn badge-pill">
                                    <i class="bi bi-briefcase-fill"></i>
                                </span>
                                <span class="fw-bold ms-2">Creación de Resumes</span>
                            </div>                        
                        </p>
                        <p class="card-text">
                            Podrás diseñar un CV profesional que resalte tus habilidades, experiencia 
                            y logros de manera clara y atractiva desde la comodidad de tu hogar.
                        </p>
                    </div> 
                </div>
            </div>

            <!--TARJETITA #2-->
            <div class="col-md-4">
                <div class="card border-dark">
                    <div class="card-body">
                        <p class="card-title">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success badge-pill lightgreen ">
                                    <i class="bi bi-person-bounding-box"></i>
                                </span>
                                <span class="fw-bold ms-2">Encuentra Puestos de Trabajo</span>
                            </div>                        
                        </p>
                        <p class="card-text">
                            Simplificamos tu búsqueda de empleo y conectarte con oportunidades laborales 
                            que se ajusten a tus habilidades y aspiraciones profesionales.
                        </p>
                    </div> 
                </div>
            </div>

            <!--TARJETITA #3-->
            <div class="col-md-4">
                <div class="card border-dark">
                    <div class="card-body">
                        <p class="card-title">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success joinBtn badge-pill">
                                    <i class="bi bi-star-fill"></i>
                                </span>
                                <span class="fw-bold ms-2">Seguimiento de Solicitudes</span>
                            </div>                        
                        </p>
                        <p class="card-text">
                            Recibirás actualizaciones instantáneas sobre el estado de tu solicitud directamente en tu 
                            bandeja de entrada. ¿Invitación para una entrevista? ¡Te lo notificamos al instante! 
                        </p>
                    </div> 
                </div>
            </div>

        </div>
    </div>

    <!--SECCION 4: VISTA PREVIA DE ULTIMAS OFERTAS DE EMPLEO -->
    <div class="container-fluid my-5 py-5 hero black" id="posts">
        <div class="row pt-4">
            <center>
                <p class="h2 mt-2">Posts Recientes</p>
                <div class="col-md-8">
                    <p>Te invitamos a ver algunos de los puestos de trabajo que se publican en nuestra
                        plataforma. Si deseas aplicar para estos y muchos más, créate una cuenta gratuita
                        con nosotros.</p>
                </div>
            </center>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    @foreach($jobLatest as $latest)
                    <div class="card mb-4">
                        <img src="vendor\adminlte\dist\img\think-nobg.png" alt="" class="card-img-top img-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{$latest->name}}</h5>
                            <p class="card-text lightgreen">{{$latest->company->comp_name }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($latest->description, 90, $end='...') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-8">
                    @foreach($jobPositions as $key => $jobPos)
                        @if($key > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{$jobPos->name}}</h5>
                                <p class="card-text lightgreen">{{$jobPos->company->comp_name }}</p>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($jobPos->description, 90, $end='...') }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
        </div>

        <div class="row" id="aboutUs">
        </div>
    </div>

    <!--SECCION 5: ACERCA DE NOSOTROS -->
    <div class="container my-4 py-4 black" >
        <center>
            <p class="h2 mb-4">Acerca de Nosotros</p>
        </center>
        <div class="row">
                <div class="col-md-4">
                    <p class="mx-2">Proyecto elaborado por los estudiantes universitarios de la clase de Desarrollo de 
                        Aplicaciones en Internet, en un espacio de dos meses aproximademente, yendo desde la fase de planeación
                        a producción utilizando las tecnologías de Laravel abordadas en clase.</p>
                </div>
                <div class="col-md-8">
                    <img src="vendor\adminlte\dist\img\reu.jpg" alt="" srcset="" class="img-fluid">
                </div>
        </div>
    </div>

    <!--SECCION 6: FOOTER Y DEDICATORIAS -->
        <footer class="footer bg-color text-center">
            <div class="container">
                    <p class="display-5">AbleCareers</p>
            <div class="row justify-content-between me-3">
                <div class="col-md-3">
                    <ul>
                        <li>Miguel Alonso Lainez</li>
                        <li>José Medardo López</li>
                        <li>Carlos Andrés Pineda</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Alexandra Isabel Caballero</li>
                        <li>Diego Enrique Martell</li>
                        <li>Erick Jafeth Ventura</li>
                        <li>Carlos Daniel Palma</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Walter Antonio Alba</li>
                        <li>Belly Bonilla Martell</li>
                        <li>Derick Nebil Coello</li>
                    </ul>
                </div>
            </div>
            
            <p>&copy;&nbsp;All rights reserved.</p>
            </div>
        </footer>
    
</body>
</html>