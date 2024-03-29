@extends('adminlte::page')

@section('content')
            <div class="mt-2">
                <h1>Formulario de Solicitud de Empresa</h1> <br>
            </div>

            <div class="col card" style="background-color: rgb(233, 233, 233)">
                <div class="card-body text-dark ">

                    <form action="{{ route('postulant.createrequest')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Información</label>
                            <textarea style="height: 150px; resize:none" name="info" class="form-control" aria-label="With textarea"></textarea>
                        </div>

                        <a href="{{route('postulant.postulanthome')}}" class="btn btn-danger"><i class="bi bi-x-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-floppy"></i>&nbsp;Guardar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
