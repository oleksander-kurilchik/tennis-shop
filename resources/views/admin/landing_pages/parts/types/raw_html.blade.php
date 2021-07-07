<div class="form-group {{$bag->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Опис', ['class' => 'control-label ']) !!}
    <div class="w-100">
        {!! Form::textarea('value', old($old_prefix.".value"), ['class' => 'form-control ' ,]) !!}
        {!! $bag->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
