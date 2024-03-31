@php
    use App\Models\UserRequest;
@endphp

@extends('adminlte::page')

@section('title', 'Lista de Solicitudes de Usuarios')

@section('content')
<div class="col-md-12 mt-2" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Solicitudes de Usuarios</p>
        <p class="h5">Aquí se muestran las solicitudes de los usuarios.</p>
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

    <!-- Aquí va el código para mostrar las solicitudes de acuerdo al estado seleccionado -->
    @foreach ($userRequest as $request)
    <div class="col" style="padding-top: 20px;">
        <div class="card border-{{ strtolower($request->request_status) === 'aplicando' ? 'primary' : (strtolower($request->request_status) === 'aprobado' ? 'success' : 'danger') }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="h5">Nombre: {{ $request->user->name }} {{ $request->user->lastName }}</p>
                        <p class="text-dark">Correo: {{ $request->user->email }}</p>
                        <p class="text-info">Teléfono: {{ $request->user->phoneNumber }}</p>
                        <p class="text-dark">Solicitud: {{ $request->request_info }}</p>
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
