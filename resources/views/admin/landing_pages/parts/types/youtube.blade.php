<div class="form-group {{$bag->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Опис', ['class' => 'control-label ']) !!}
    <div class="w-100">
        {!! Form::text('value', old($old_prefix.".value" ), ['class' => 'form-control ' ,'autocomplete'=>'off']) !!}
        {!! $bag->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
