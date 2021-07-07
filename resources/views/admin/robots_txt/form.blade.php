<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва - (лише для адмінки)', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Заголовок', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('title', null, ['class' => 'form-control ', 'required' => 'required']) !!}
        {!! $errors->first('title', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('faqs_categories_id') ? 'has-error' : ''}}">
    {!! Form::label('faqs_categories_id', 'Категория', ['class' => ' control-label']) !!}
    <div class="">
        {!!  Form::select('faqs_categories_id', $categories,null,['class'=>'form-control ']); !!}
        {!! $errors->first('faqs_categories_id', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('sorting') ? 'has-error' : ''}}">
    {!! Form::label('sorting', 'Сортування', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::number('sorting', old("sorting",isset($faq)?$faq->sorting:0), ['class' => 'form-control']) !!}
        {!! $errors->first('sorting', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{$errors->has('description')?' has-error':''}}">
    {!! Form::label('description', 'Опис', ['class' => 'control-label ']) !!}
    <div class="w-100">
        {!! Form::textarea('description',  null , ['class' => 'form-control description ckeditor' ,]) !!}
        {!! $errors->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('published') ? 'has-error' : ''}}">
    {!! Form::label('published', 'Опубліковано', ['class' => ' control-label']) !!}
    <div class="">
        <div class="radio radio-primary inline-block">
            <label>{!! Form::radio('published', 1) !!} Так</label>
        </div>
        <div class="radio radio-primary inline-block">
            <label>{!! Form::radio('published', 0, true) !!} Ні</label>
        </div>
        {!! $errors->first('published', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>




