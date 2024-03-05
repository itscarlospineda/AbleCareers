@extends('layouts.common')

@section('content')
            <div class="col">
                <h1>Creación de Usuario</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark">

                    <form action="" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre del Usuario</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Apellido del Usuario</label>
                            <input type="text" class="form-control" name="lname">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Número de Teléfono (####-####)</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Correo Electrónico</label>
                            <input type="text" class="form-control" name="mail">
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