<div class="form-category-wrapper">

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        {!! Form::label('slug', 'Slug', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            {!! $errors->first('slug', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>



    <div class="form-group">
        <div class=" col-md-12" style="text-align: center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

