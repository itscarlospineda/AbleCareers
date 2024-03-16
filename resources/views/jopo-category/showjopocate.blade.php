@extends('layouts.admin')

@section('template_title')
    {{ $jopoCategory->name ?? __('Show') . " " . __('Jopo Category') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Jopo Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('jopo-categories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $jopoCategory->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Job Position Id:</strong>
                            {{ $jopoCategory->job_position_id }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $jopoCategory->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
