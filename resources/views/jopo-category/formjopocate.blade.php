<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('category_id') }}
            {{ Form::text('category_id', $jopoCategory->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('job_position_id') }}
            {{ Form::text('job_position_id', $jopoCategory->job_position_id, ['class' => 'form-control' . ($errors->has('job_position_id') ? ' is-invalid' : ''), 'placeholder' => 'Job Position Id']) }}
            {!! $errors->first('job_position_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_active') }}
            {{ Form::text('is_active', $jopoCategory->is_active, ['class' => 'form-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'placeholder' => 'Is Active']) }}
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
