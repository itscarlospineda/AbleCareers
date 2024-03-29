@extends('adminlte::page')

@section('title', 'Solicitud para Empresas')

@section('content')
<div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
    <div class="col">
        <p class="h2">Formulario de Solicitud de Empresa</p>
        <p class="text-dark">En este apartado, puedes aplicar para cambiar tu cuenta al tier 
            empresarial, aliándote con nosotros y brindándote las herramientas esenciales 
            para conectarte con los demás. Se somete la solicitud bajo un riguroso control.
        </p> <br>
    </div>

    <div class="col card" style="background-color: rgb(233, 233, 233)">
        <div class="card-body text-dark ">

            <form action="{{ route('postulant.createrequest')}}" method="POST">
                @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Información</label>
                        <textarea style="height: 150px; resize:none" name="info" class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <a href="{{route('postulant.postulanthome')}}" class="btn btn-danger">
                        <i class="bi bi-x-circle"></i>&nbsp;Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-floppy"></i>&nbsp;Guardar
                    </button>

            </form>
        </div>
    </div>
</div>
@endsection