<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $userRequest->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('request_info') }}
            {{ Form::text('request_info', $userRequest->request_info, ['class' => 'form-control' . ($errors->has('request_info') ? ' is-invalid' : ''), 'placeholder' => 'Request Info']) }}
            {!! $errors->first('request_info', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('request_status') }}
            {{ Form::text('request_status', $userRequest->request_status, ['class' => 'form-control' . ($errors->has('request_status') ? ' is-invalid' : ''), 'placeholder' => 'Request Status']) }}
            {!! $errors->first('request_status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $userRequest->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>