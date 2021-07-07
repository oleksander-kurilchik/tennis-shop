<div class="form-products-wrapper">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required' , "autocomplete"=>"off"]) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    @foreach($languages as $language)
        <div class="form-group {{ $errors->has('title.'.$language->value) ? 'has-error' : ''}}">
            {!! Form::label('', 'Заголовок - '. $language->name  , ['class' => ' control-label']) !!}
            <div class="">
                {!! Form::text("title[{$language->value}]", old("name[{$language->value}]",(isset($group)?$group->getTranslation('title',$language->value,false):'')), ['class' => 'form-control', 'required' => 'required' , 'autocomplete'=>'off']) !!}
                {!! $errors->first("title[{$language->value}]", '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
        </div>
    @endforeach






    <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
        {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('order', old("order",isset($group)?$group->order:0), ['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
            {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
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
        <div class="w-100 text-center" >
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
