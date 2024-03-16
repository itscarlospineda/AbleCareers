@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Job Position
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Posicion de trabajo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('job-positions.update', $jobPosition->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('job-position.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
