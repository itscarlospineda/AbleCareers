@extends('layouts.common')

@section('content')
            <div class="col">
                <h1>Editar Perfil</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    
                    <form action="" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Usuario</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Apellido del Usuario</label>
                            <input type="text" class="form-control" name="lname">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Número de Teléfono (####-####)</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Correo Electrónico</label>
                            <input type="text" class="form-control" name="mail">
                        </div>
                       
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-danger"><i class="bi bi-x-circle"></i>&nbsp;Cancelar</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i>&nbsp;Actualizar</button>       
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>       
</div>

@endsection