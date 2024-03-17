<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $user->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lastName') }}
            {{ Form::text('lastName', $user->lastName, ['class' => 'form-control' . ($errors->has('lastName') ? ' is-invalid' : ''), 'placeholder' => 'Lastname']) }}
            {!! $errors->first('lastName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phoneNumber') }}
            {{ Form::text('phoneNumber', $user->phoneNumber, ['class' => 'form-control' . ($errors->has('phoneNumber') ? ' is-invalid' : ''), 'placeholder' => 'Phonenumber']) }}
            {!! $errors->first('phoneNumber', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Phonenumber']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{--  <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $user->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userCreated') }}
            {{ Form::text('userCreated', $user->userCreated, ['class' => 'form-control' . ($errors->has('userCreated') ? ' is-invalid' : ''), 'placeholder' => 'Usercreated']) }}
            {!! $errors->first('userCreated', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userModified') }}
            {{ Form::text('userModified', $user->userModified, ['class' => 'form-control' . ($errors->has('userModified') ? ' is-invalid' : ''), 'placeholder' => 'Usermodified']) }}
            {!! $errors->first('userModified', '<div class="invalid-feedback">:message</div>') !!}
        </div>  --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>