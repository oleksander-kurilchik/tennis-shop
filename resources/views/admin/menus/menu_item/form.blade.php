<div class="form-category-wrapper">

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('title_uk') ? 'has-error' : ''}}">
        {!! Form::label('title_uk', 'Назва меню uk', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('title_uk', null, ['class' => 'form-control']) !!}
            {!! $errors->first('title_uk', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('title_ru') ? 'has-error' : ''}}">
        {!! Form::label('title_ru', 'Назва меню ru', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('title_ru', null, ['class' => 'form-control']) !!}
            {!! $errors->first('title_ru', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

{{--    <div class="form-group {{ $errors->has('title_en') ? 'has-error' : ''}}">--}}
{{--        {!! Form::label('title_en', 'Назва меню en', ['class' => ' control-label']) !!}--}}
{{--        <div class="">--}}
{{--            {!! Form::text('title_en', null, ['class' => 'form-control']) !!}--}}
{{--            {!! $errors->first('title_en', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="form-group {{ $errors->has('url_uk') ? 'has-error' : ''}}">
        {!! Form::label('url_uk', 'Посилання uk', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('url_uk', null, ['class' => 'form-control']) !!}
            {!! $errors->first('url_uk', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('url_ru') ? 'has-error' : ''}}">
        {!! Form::label('url_ru', 'Посилання ru', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('url_ru', null, ['class' => 'form-control']) !!}
            {!! $errors->first('url_ru', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
{{--    <div class="form-group {{ $errors->has('url_en') ? 'has-error' : ''}}">--}}
{{--        {!! Form::label('url_en', 'Посилання en', ['class' => ' control-label']) !!}--}}
{{--        <div class="">--}}
{{--            {!! Form::text('url_en', null, ['class' => 'form-control']) !!}--}}
{{--            {!! $errors->first('url_en', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}



    <div class="form-group {{ $errors->has('target') ? 'has-error' : ''}}">
        {!! Form::label('target', 'target', ['class' => ' control-label']) !!}
        <div class="">
            {!!  Form::select('target', $targetList, null,['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
            {!! $errors->first('target', '<p class="invalid-feedback d-block">:message</p>') !!}
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


     {!! Form::hidden('menu_id',$menu->id) !!}



    <div class="form-group">
        <div class=" col-md-12" style="text-align: center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

