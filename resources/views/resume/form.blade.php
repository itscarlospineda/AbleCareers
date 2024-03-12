<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('info') }}
            {{ Form::text('info', $resume->info, ['class' => 'form-control' . ($errors->has('info') ? ' is-invalid' : ''), 'placeholder' => 'Info']) }}
            {!! $errors->first('info', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('education') }}
            {{ Form::text('education', $resume->education, ['class' => 'form-control' . ($errors->has('education') ? ' is-invalid' : ''), 'placeholder' => 'Education']) }}
            {!! $errors->first('education', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('work_experience') }}
            {{ Form::text('work_experience', $resume->work_experience, ['class' => 'form-control' . ($errors->has('work_experience') ? ' is-invalid' : ''), 'placeholder' => 'Work Experience']) }}
            {!! $errors->first('work_experience', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('extra') }}
            {{ Form::text('extra', $resume->extra, ['class' => 'form-control' . ($errors->has('extra') ? ' is-invalid' : ''), 'placeholder' => 'Extra']) }}
            {!! $errors->first('extra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reference') }}
            {{ Form::text('reference', $resume->reference, ['class' => 'form-control' . ($errors->has('reference') ? ' is-invalid' : ''), 'placeholder' => 'Reference']) }}
            {!! $errors->first('reference', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('photo') }}
            {{ Form::text('photo', $resume->photo, ['class' => 'form-control' . ($errors->has('photo') ? ' is-invalid' : ''), 'placeholder' => 'Photo']) }}
            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $resume->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $resume->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>