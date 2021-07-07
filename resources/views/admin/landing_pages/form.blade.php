<div class="form-pages-wrapper">

    <div class="form-group pb-4 {{ $errors->has('name') ? 'has-error' : ''}}  ">
        {!! Form::label('name', 'Назва', ['class' => ' ']) !!}
        <div class="w-100">
            {!! Form::text('name', null, ['class' => 'form-control'  ]) !!}
            {!! $errors->first('name', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}} ">
        {!! Form::label('slug', 'Посилання', ['class' => ' ']) !!}
        <div class="w-100">
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            {!! $errors->first('slug', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group pb-4 {{ $errors->has('classes') ? 'has-error' : ''}}  ">
        {!! Form::label('classes', 'Додаткові css класи', ['class' => ' ']) !!}
        <div class="w-100">
            {!! Form::text('classes', null, ['class' => 'form-control'  ]) !!}
            {!! $errors->first('classes', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('published') ? 'has-error' : ''}} ">
        {!! Form::label('published', 'Опубліковано', ['class' => ' ']) !!}
        <div class="w-100 form-check form-check-inline  flex-wrap">
            <div class="checkbox">
                {!! Form::radio('published', 1) !!} <label> Так</label>
            </div>
            <div class="checkbox">
                {!! Form::radio('published', 0, true) !!}<label> Ні</label>
            </div>
            {!! $errors->first('published', ' <p class="invalid-feedback d-block w-100">:message</p>') !!}
        </div>
    </div>


{{--    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">--}}
{{--        {!! Form::label('image', 'Зображення ', ['class' => ' control-label']) !!}--}}
{{--        <div class="">--}}
{{--            <input class="form-control-file" name="image" id="image" type="file"   >--}}
{{--            {!! $errors->first('image', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="form-group">
        <div class=" w-100 text-center " style="text-align: center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

{{--@if(isset($landing_page))--}}
{{--    <div class="form-group pt-4 pb-4 ">--}}
{{--        {!! Form::label('image', 'Зображення ', ['class' => ' control-label']) !!}--}}

{{--        <div class="col-md-12">--}}
{{--            <img style="max-width: 100%;height: auto" src="{!! $landing_page->fullPathImage() !!}"></div>--}}
{{--    </div>--}}
{{--@endif--}}



