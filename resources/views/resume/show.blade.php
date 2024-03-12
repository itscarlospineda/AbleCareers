@extends('layouts.app')

@section('template_title')
    {{ $resume->name ?? __('Show') . " " . __('Resume') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Resume</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('resumes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Info:</strong>
                            {{ $resume->info }}
                        </div>
                        <div class="form-group">
                            <strong>Education:</strong>
                            {{ $resume->education }}
                        </div>
                        <div class="form-group">
                            <strong>Work Experience:</strong>
                            {{ $resume->work_experience }}
                        </div>
                        <div class="form-group">
                            <strong>Extra:</strong>
                            {{ $resume->extra }}
                        </div>
                        <div class="form-group">
                            <strong>Reference:</strong>
                            {{ $resume->reference }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $resume->photo }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $resume->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $resume->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
