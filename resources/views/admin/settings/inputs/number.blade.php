<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Значення', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::number('value', null, ['class' => 'form-control ' ,'autocomplete'=>'off' ]) !!}
        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
