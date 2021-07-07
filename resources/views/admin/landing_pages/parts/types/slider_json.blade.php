<div class="form-group {{$bag->has('value')?' has-error':''}}">
     <div class="w-100 slider-json-wrap ">
        {!! Form::textarea('value', old($old_prefix.".value"), ['class' => 'form-control d-none slider-json' ,'autocomplete'=>'off']) !!}
    </div>
    {!! $bag->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
</div>
