@extends('adminlte::page')

@section('title', 'Postulant Home')


@section('content')

    <div class="container  mt-5 pt-5 ">
        <div class="row gy-3">
            <div class="col-md-6">
                <center>
                    <img src="{{ asset('images/postulantHome.png') }}" class="front" alt="" srcset=""
                        width="300px" height="auto" style="border-radius: 10px;">
                </center>
            </div>
            <div class="col-md-6">
                <br><br>
                <p class="display-4">Encuentra el trabajo que deseas en AbleCareers</p>
                <p class="h3">¡El éxito no tiene etiquetas!</p>
            </div>
        </div>
    </div>

    <div class="row mt-5">

        <div class="col-lg-4 col-6">
            <div class="small-box bg-info mt-4">
                <div class="inner">
                    <h3>{{$applyCount}}</h3>
                    <p>Posts Aplicados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <a href="{{route('postslist')}}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success mt-4">
                <div class="inner">
                    <h3>3</h3>
                    <p>Posts Aceptados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <a href="" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger mt-4">
                <div class="inner">
                    <h3>3</h3>
                    <p>Posts Denegados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-xmark"></i>
                </div>
                <a href="" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- SI YA APLICO Y LO RECHAZARON NO SE MOSTRARA --}}
    @if ($postulantRequestCount == 0)
    <div class="container offers">
        <div class="card mb-3 mt-5" style="max-width: 100%;">
            <div class="row g-0">
                <div class="pt-4 ms-4 col-md-3">
                    <img src="{{ asset('images/company_request.png') }}" class="card-img img-fluid rounded-start"
                        alt="company_request.png">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text display-4">¿Eres dueño o administrador de una empresa?</p>
                        <p class="card-text h5">Puedes aplicar a ser parte de nuestra red de empresas y contar con mayores
                            beneficios.
                        </p> <br>
                        <a href="{{ route('postulant.companyrequest') }}" class="btn btn-danger">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            &nbsp;
                            Aplicar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
