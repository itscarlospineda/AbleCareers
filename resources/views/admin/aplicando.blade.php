@php
    use App\Models\UserRequest;
@endphp

@extends('adminlte::page')

@section('title', 'Lista de Solicitudes de Usuarios')

@section('content')
<div class="col-md-12 mt-2" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Solicitudes de Usuarios (Aplicando)</p>
        <p class="h5">Aquí se muestran las solicitudes en estado "Aplicando".</p>
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

    <!-- Aquí va el código para mostrar las solicitudes en estado "Aplicando" -->
    @foreach ($userRequest->sortByDesc('created_at') as $request)
    <div class="col" style="padding-top: 20px;">
        <div class="card text-center">
            <div class="card-header{{ strtolower($request->request_status) === 'aprobado' ? ' bg-success' : (strtolower($request->request_status) === 'denegado' ? ' bg-danger' : (strtolower($request->request_status) === 'aplicando' ? ' bg-primary' : '')) }}">
                {{ strtoupper($request->request_status) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $request->user->name }} {{ $request->user->lastName }}</h5>
                <p class="text-dark">Correo: {{ $request->user->email }}</p>
                <p class="text-info">Teléfono: {{ $request->user->phoneNumber }}</p>
                <p class="text-dark">Solicitud: {{ $request->request_info }}</p>
                <p class="text-primary">Fecha y Hora de Creación: {{ $request->created_at }}</p>
                <a href="{{ route('admin.requestdetails', ['id' => $request->id]) }}" class="btn btn-primary">Ver más</a>
            </div>
            <div class="card-footer text-muted">
                {{ $request->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
