@extends('layouts.app')

@section('template_title')
    {{ $jobPosition->name ?? __('Show') . " " . __('Job Position') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Job Position</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('job-positions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $jobPosition->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $jobPosition->description }}
                        </div>
                        <div class="form-group">
                            <strong>Post Date:</strong>
                            {{ $jobPosition->post_date }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $jobPosition->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $jobPosition->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
