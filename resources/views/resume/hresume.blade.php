@extends('layouts.common')

@section('content')
<a href="{{ route('resume.create')}}">Crear</a>
<div class="table-responsive">
    <table id="resumes-table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Información</th>
                <th>Educación</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resumes as $resume)
            <tr>
                <td>{{ $resume->info }}</td>
                <td>{{ $resume->education }}</td>
                <td><img src="/storage{{ $resume->photo }}" alt="Foto del resumen" style="max-width: 100px; max-height: 100px;">
                </td>
                <td>
                    <a href="{{ route('resume.edit', ['id' => $resume->id]) }}" class="btn btn-outline-primary">Editar</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $resume->id }}">Eliminar</button>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDelete{{ $resume->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este resumen?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('resume.destroy', ['id' => $resume->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>                                    
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
