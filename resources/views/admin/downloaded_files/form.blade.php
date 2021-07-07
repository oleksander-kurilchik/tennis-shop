<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва - (лише для адмінки)', ['class' => ' control-label']) !!}
    <div class=" ">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Опис', ['class' => ' control-label']) !!}
    <div class=" ">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required' ,"style"=>"min-width: 100%;max-width: 100%;min-height: 50px;max-height: 150px;"]) !!}
        {!! $errors->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group pt-1 {{ $errors->has('file') ? 'has-error' : ''}}">
    {!! Form::label('file', 'Виберіть файл', ['class' => ' control-label']) !!}
    <input class="form-control-file" name="file" id="file" type="file" @if(!isset($file))required="required" @endif >
    {!! $errors->first('file', '<p class="invalid-feedback d-block">:message</p>') !!}
 </div>

@if(isset($file))
    <div class="form-group ">
        {!! Form::label('image', 'Файл ', ['class' => ' w-100  control-label',"style"=>"text-align:left"]) !!}
        <div class="w-100">
            <a href="{!! $file->url !!}">{{$file->file_name}} </a>
        </div>
    </div>
@endif

<div class="form-group">
    <div class=" w-100 text-center " style="text-align: center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
