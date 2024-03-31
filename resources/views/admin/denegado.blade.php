@php
    use App\Models\UserRequest;
@endphp

@extends('adminlte::page')

@section('title', 'Lista de Solicitudes de Usuarios')

@section('content')
<div class="col-md-12 mt-2" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Solicitudes de Usuarios (Denegados)</p>
        <p class="h5">Aquí se muestran las solicitudes en estado "Denegado".</p>
    </div>

    <!-- Pestañas de filtro -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link{{ !isset($status) ? ' active' : '' }}" href="{{ route('userRequest.index') }}">Todos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ isset($status) && $status === 'aplicando' ? ' active' : '' }}" href="{{ route('userRequest.index', ['status' => 'aplicando']) }}">Aplicando</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ isset($status) && $status === 'aprobado' ? ' active' : '' }}" href="{{ route('userRequest.index', ['status' => 'aprobado']) }}">Aceptados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ isset($status) && $status === 'denegado' ? ' active' : '' }}" href="{{ route('userRequest.index', ['status' => 'denegado']) }}">Denegados</a>
        </li>
    </ul>

    <!-- Aquí va el código para mostrar las solicitudes en estado "Denegado" -->
    @foreach ($userRequest as $request)
    <div class="col" style="padding-top: 20px;">
        <div class="card border-danger">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="h5">{{ $request->request_info }}</p>
                        <p class="text-dark">Estado: {{ $request->request_status }}</p>
                        <p class="text-primary">Fecha y Hora de Creación: {{ $request->created_at }}</p>
                    </div>
                    <div class="col-md-4 align-self-center">
                        <a href="{{ route('admin.requestdetails', ['id' => $request->id]) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Ver más
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
