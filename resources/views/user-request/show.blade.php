@extends('layouts.app')

@section('template_title')
    {{ $userRequest->name ?? __('Show') . " " . __('User Request') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User Request</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user-request.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userRequest->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Request Info:</strong>
                            {{ $userRequest->request_info }}
                        </div>
                        <div class="form-group">
                            <strong>Request Status:</strong>
                            {{ $userRequest->request_status }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $userRequest->is_active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
