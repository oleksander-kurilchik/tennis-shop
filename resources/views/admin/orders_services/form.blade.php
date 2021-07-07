<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва - (лише для адмінки)', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Статус', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::select('status',$statuses, isset($orderService)?$orderService->status:null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('status', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Заголовок', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('title', null, ['class' => 'form-control ', 'required' => 'required']) !!}
        {!! $errors->first('title', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Опис', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::textarea('description', null, ['class' => 'form-control ckeditor', 'required' => 'required']) !!}
        {!! $errors->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Ціна', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('price', old('price',isset($orderService)?$orderService->price:0), ['class' => 'form-control']) !!}
        {!! $errors->first('price', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

