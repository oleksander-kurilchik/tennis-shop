<div class="form-group {{$errors->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Значення', ['class' => 'control-label ']) !!}
    <div class="w-100">
        {!! Form::textarea('value', old('value'), ['class' => 'form-control description ckeditor' ,]) !!}
        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
