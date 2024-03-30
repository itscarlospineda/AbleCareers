<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbleCareers - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="home.css">
</head>
<body>

    <div class="container-fluid">
        <nav class="navbar navigation fixed-top d-flex justify-content-between align-items-center">
            <div class="d-flex fw-bold">
                <a class="navbar-brand gradient ms-5" href="#">AbleCareers</a>
            </div>
        
            <div class="d-flex align-items-center">
                <ul class="nav ms-5">
                    <li class="nav-item"><a href="#" class="nav-link text-white">Posts Recientes</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Empresas</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Acerca de Nosotros</a></li>
                </ul>
            </div>
        
            <div class="d-flex align-items-center">
                <ul class="nav me-5">
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-dark fw-bold" style="background-color: white; border-radius:10px;">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">Register</a></li>
                </ul>
            </div>
        </nav>
      
        <div class="row rectangle">
            <div class="container">
                <center>
                    <p class="display-4 text-white padding-1">Bienvenido a</p>
                    <p class="display-3 fw-bold gradient">AbleCareers</p>
                </center>
            </div>
        </div>
        <div class="row oval">
            <center>
                <p class="h5 text-white">Encuentra ofertas de empleo y conéctate en el mejor lugar para expandir tu futuro.</p>
            </center>
        </div>

    </div>

    <div class="container mt-5 pt-5">
        <div class="row gy-3">

            <div class="col-md-7">
                <div class="card card-body bg-color text-white">
                    <p class="h3">Aliados con</p>
                    <p class="h1">+15</p>
                    <p class="h3">empresas a nivel nacional</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card card-body bg-color text-white">
                    <p class="h1">Construye tu futuro:</p>
                    <p class="h4">Explora empleos que se ajusten a tus habilidades.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5 pt-5" style="min-height: 100vh;">
        <div class="col py-4">
            <center>
                <p class="h1">Posts Recientes</p>
            </center>
        </div>

        <div class="row gy-3">

            @foreach($jobPositions as $jobPos)
            <div class="col-md-4">
                <div class="col-lg">
                    <div class="card h-100">
                      <img src="https://plus.unsplash.com/premium_photo-1683121710572-7723bd2e235d?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                      alt="image" srcset="" class="card-img-top img-dark">
                      <div class="card-body">
                        <h5 class="card-title">{{$jobPos->name}}</h5>
                        <p class="card-text text-danger">{{$jobPos->company->comp_name }}</p>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($jobPos->description, 65, $end='...') }}</p>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach

        </div>

        <div class="col py-4">
            <center>
                <p class="h5">Si deseas aplicar a estos puestos y muchos más, créate una cuenta con nosotros.</p>
            </center>
        </div>

    </div>

    <footer class="footer bg-color">
        <p class="display-5">AbleCareers</p>
        <p>&copy;&nbsp;All rights reserved.</p>
    </footer>

</body>
</html>
