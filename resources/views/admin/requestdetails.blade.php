@php
    use App\Models\UserRequest;
@endphp

@extends('adminlte::page')

@section('title', 'Detalles de Solicitud de Usuario')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Detalles de la Solicitud de Usuario</p>
    </div>

    <div class="card border-dark">
        <div class="card-body">
            @if($request)
                <p class="h5">Información de la Solicitud:</p>
                <p class="text-dark">{{ $request->request_info }}</p>
                <p class="text-primary">Estado: {{ $request->request_status }}</p>
                <p class="text-primary">Fecha y Hora de Creación: {{ $request->created_at }}</p>
                <hr>

                <p class="h5">Información del Usuario:</p>
                <p class="text-dark">Nombre: {{ $request->user->name }} {{ $request->user->lastName }}</p>
                <p class="text-dark">Correo: {{ $request->user->email }}</p>
                <p class="text-info">Teléfono: {{ $request->user->phoneNumber }}</p>

                <hr>

                <div class="mt-3 btn-group" role="group">
                    <form action="{{ route('admin.request.accept', ['id' => $request->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </form>
                    
                    <form action="{{ route('admin.request.deny', ['id' => $request->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Denegar</button>
                    </form>
                
                    <a href="{{ route('userRequest.index') }}" class="btn btn-secondary">Volver</a>
                </div>
                
            @else
                <div class="alert alert-danger" role="alert">
                    No se encontraron detalles de la solicitud disponibles.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
