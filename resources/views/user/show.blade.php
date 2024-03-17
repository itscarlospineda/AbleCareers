@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Show') . " " . __('User') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $user->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $user->lastName }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phonenumber:</strong>
                            {{ $user->phoneNumber }}
                        </div>
                        <div class="form-group">
                            <strong>Is Active:</strong>
                            {{ $user->is_active }}
                        </div>
                        <div class="form-group">
                            <strong>Usercreated:</strong>
                            {{ $user->userCreated }}
                        </div>
                        <div class="form-group">
                            <strong>Usermodified:</strong>
                            {{ $user->userModified }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
