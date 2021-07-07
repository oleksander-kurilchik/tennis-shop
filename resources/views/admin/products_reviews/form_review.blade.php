
<div class="form-group  {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Опис', ['class' => ' control-label' ,"for"=>"description"]) !!}
    <div class="">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required',"style"=>"min-width: 100%;max-width: 100%;"]) !!}
        {!! $errors->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->getBag("rating")->has('rating') ? 'has-error' : ''}}">
    {!! Form::label('rating', 'Оценка', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::number('rating', old("rating"), ['class' => 'form-control', 'required' => 'required','min'=>'1','max'=>'5']) !!}
        {!! $errors->getBag("rating")->first('rating', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_of_sending') ? 'has-error' : ''}}">
    {!! Form::label('date_of_sending', 'Дата відгуку', ['class' => ' control-label ']) !!}
    <div class="">
        {!! Form::text('date_of_sending', null, ['class' => 'form-control replace-date-and-time', 'required' => 'required','autocomplete'=>'off']) !!}
        {!! $errors->first('date_of_sending', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('published') ? 'has-error' : ''}}">
    {!! Form::label('published', 'Опубліковано', ['class' => ' control-label']) !!}
    <div class="">
        <div class="checkbox" style="display: inline-block">
    <label>{!! Form::radio('published', 1) !!} Так</label>
</div>
<div class="checkbox" style="display: inline-block">
    <label>{!! Form::radio('published', 0, true) !!} НІ</label>
</div>
        {!! $errors->first('published', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push("scripts")
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $(document).ready(function () {
            //CKEDITOR.replace('descri' );
            $.datetimepicker.setLocale('uk');
            $(".replace-date-and-time").datetimepicker(
                {
                    timepicker:true,
                    format: 'Y-m-d H:i:s',
                    mask: true
                });
        })
    </script>
@endpush
