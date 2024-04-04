@extends('adminlte::page')

@section('title', 'SuperUser Home')


@section('content')
    <p class="h1 m-0 card-header">BIENVENIDO {{ strtoupper($user->name) }}</p>

    <div class="card card-warning">
        <div class="card-header">
            <p class="h1 card-title">PANEL SUPERUSUARIO</p>
        </div>
        <div class="card-body">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>
                    <p class="h2">Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-group"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>

            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ $postsCount }}</h3>
                    <p>Posts Creados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <a href="{{ route('admin.postslist') }}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>

            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>{{ $companiesCount }}</h3>
                    <p>Compañias</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-building"></i>
                </div>
                <a href="{{ route('admin.company.index') }}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>

            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $pendingRequestsCount }}</h3>
                    <p>Solicitudes para ser Compañia</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <a href="{{ route('userRequest.index') }}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
