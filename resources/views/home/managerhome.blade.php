@extends('adminlte::page')

@section('title', 'Manager Home')


@section('content')
    <p class="h1 m-0 card-header">BIENVENIDO {{ strtoupper($user->name) }}</p>

    <div class="card card-success">
        <div class="card-header">
            <p class="h1 card-title">COMPANY - {{ strtoupper($user->companyUser->company->comp_name) }}</p>
        </div>
        <div class="card-body">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $employeesCount }}</h3>
                    <p class="h2">Empleados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-group"></i>
                </div>
                <a href="{{ route('manager.showEmployees') }}" class="small-box-footer">
                    Administrar
                    <i class="fa-solid fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $postsCount }}</h3>
                    <p>Posts Creados</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <a href="{{ route('ceo.postlist.showpost') }}" class="small-box-footer">
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
