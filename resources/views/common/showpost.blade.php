@php
    use App\Models\JopoResume;
@endphp
@extends('adminlte::page')

@section('title', 'Detalles del Puesto')

@section('content')
    <div class="col-md-12" style="padding-top: 20px; padding-left: 30px;">
        <div class="col">
            <p class="h2">Detalles del Puesto</p>
        </div>

        <div class="card border-dark">
            <div class="card-body">
                @if ($jobPosition)
                    <p class="h5">{{ $jobPosition->name }}</p>
                    @if ($jobPosition->company)
                        <p class="text-dark">Empresa: {{ $jobPosition->company->comp_name }}</p>
                    @else
                        <p class="text-dark">Empresa: No especificada</p>
                    @endif
                    <p class="text-primary">Fecha y Hora de Publicación: {{ $jobPosition->post_date }}</p>
                    <hr>
                    <p>{{ $jobPosition->description }}</p>

                    <!-- Lógica de aplicación -->
                    @if ($resumes->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Debes crear un currículum primero para poder aplicar a este puesto.
                        </div>
                    @elseif (JopoResume::whereHas('resume', function ($query) {
                            $query->where('user_id', auth()->id());
                        })->where('job_position_id', $jobPosition->id)->exists())
                        <button class="btn btn-primary" disabled>Aplicando</button>
                        <br>
                        <span class="text-success">
                            <i class="fa-solid fa-building-circle-check"></i>
                            &nbsp;
                            Ya has aplicado a esta posición
                        </span>
                    @else
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Aplicar
                        </button>
                    @endif
                @else
                    <div class="alert alert-danger" role="alert">
                        No se encontraron detalles de puesto disponibles.
                    </div>
                @endif
            </div>
        </div>
        <!-- Botón para volver a la página anterior -->
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona un Currículum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Lista de Currículums -->
                    @if ($resumes->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Debes crear un currículum primero para poder aplicar a este puesto.
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Información</th>
                                    <th>Foto</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resumes as $resume)
                                    <tr>
                                        <td>{{ $resume->info }}</td>
                                        <td><img src="{{ asset($resume->photo) }}" alt="Foto del resumen"
                                                style="max-width: 100px; max-height: 100px;"></td>
                                        <td>
                                            <form action="{{ route('jobpositions.apply') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                                <input type="hidden" name="job_position_id" value="{{ $jobPosition->id }}">
                                                <button type="submit" class="btn btn-success apply-button">Seleccionar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
