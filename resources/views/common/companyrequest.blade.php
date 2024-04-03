@extends('adminlte::page')

@section('title', 'Solicitud para Empresas')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Formulario de Solicitud de Empresa</p>
        <p class="text-dark">En este apartado, puedes aplicar para cambiar tu cuenta al tier empresarial, aliándote con nosotros y brindándote las herramientas esenciales para conectarte con los demás. Se somete la solicitud bajo un riguroso control.</p>
        <br>
    </div>

    <div class="col card" style="background-color: rgb(233, 233, 233)">
        <div class="card-body text-dark ">
            <form action="{{ $userRequest ? route('postulant.editrequest') : route('postulant.createrequest') }}" method="POST">
                @csrf
                @if($userRequest)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Información</label>
                    <textarea style="height: 150px; resize:none" name="info" class="form-control" aria-label="With textarea">{{ $userRequest ? $userRequest->request_info : old('info') }}</textarea>
                </div>

                <a href="{{ route('postulant.postulanthome') }}" class="btn btn-danger">
                    <i class="bi bi-x-circle"></i>&nbsp;Cancelar
                </a>

                <button type="submit" class="btn btn-{{ $userRequest ? 'primary' : 'success' }}" {{ $userRequest && $userRequest->request_status === 'denegado' ? 'disabled' : '' }}>
                    <i class="bi bi-floppy"></i>&nbsp;{{ $userRequest ? 'Editar' : 'Guardar' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
