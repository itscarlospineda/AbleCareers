@extends('layouts.common')

@section('content')
            <div class="col">
                <h1>Creación de Curriculum</h1> <br>
            </div>

            <div class="col">
                <div class="card-body text-dark ">

                    
                <form action="{{ route('createresumes.create')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="info" class="form-label">Información General</label>
                            <input type="text" class="form-control" name="info">
                        </div>
                        <div class="mb-3">
                            <label for="education" class="form-label">Detalles de Educación</label>
                            <input type="text" class="form-control" name="education">
                        </div>
                        <div class="mb-3">
                            <label for="work_experience" class="form-label">Experiencia Laboral</label>
                            <input type="text" class="form-control" name="work_experience">
                        </div>
                        <div class="mb-3">
                            <label for="extra" class="form-label">Información Adicional</label>
                            <input type="text" class="form-control" name="extra">
                        </div>
                        <div class="mb-3">
                            <label for="reference" class="form-label">Referencias Personales</label>
                            <input type="text" class="form-control" name="reference">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Fotografía Personal</label>
                            <textarea name="photo" class="form-control" aria-label="With textarea"></textarea>
                            <!--<input type="text" class="form-control" name="photo">-->
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i>&nbsp;Guardar</button>       
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>       
</div>

@endsection