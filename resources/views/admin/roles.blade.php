@extends('layouts.admin')

@section('content')
            <div class="col py-4">
                <h1>Roles de Usuario</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    <form action="{{ route('admin.roles.store')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre de Rol</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="desc">
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
