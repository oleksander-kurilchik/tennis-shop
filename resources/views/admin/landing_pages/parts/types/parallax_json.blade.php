<div class="form-group {{$bag->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Опис', ['class' => 'control-label ']) !!}
    {!! Form::textarea('value', old($old_prefix.".value" ), ['class' => 'form-control d-none parallax-json' ,'autocomplete'=>'off']) !!}
    {!! $bag->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
</div>
