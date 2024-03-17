@extends('layouts.admin')

@section('content')
            <div class="col py-4">
                <h1>Compañías</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    <form action="{{ route('')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre de Compañía</label>
                            <input type="text" class="form-control" name="comp_name">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Correo de Compañía</label>
                            <input type="text" class="form-control" name="comp_mail">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Número de Compañía</label>
                            <input type="text" class="form-control" name="comp_phone">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Ciudad de Compañía</label>
                            <input type="text" class="form-control" name="comp_city">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Departamento de Compañía</label>
                            <input type="text" class="form-control" name="comp_depart">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">CEO de Compañía</label>
                            <input type="text" class="form-control" name="user_id">
                        </div>

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
