<div class="form-group {{ $errors->has('settings_groups_id') ? 'has-error' : ''}}">
    {!! Form::label('settings_groups_id', 'Група налаштувань', ['class' => ' control-label']) !!}
    <div class="">
        {!!  Form::select('settings_groups_id', $settingsGroups, null,['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
        {!! $errors->first('settings_groups_id', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва - (лише для адмінки)', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    {!! Form::label('key', 'Ключ', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('key', null, ['class' => 'form-control ', 'required' => 'required']) !!}
        {!! $errors->first('key', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Значення', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::textarea('value', null, ['class' => 'form-control',  ]) !!}
        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('validation_rules') ? 'has-error' : ''}}">
    {!! Form::label('validation_rules', 'Правила валидации', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('validation_rules', null, ['class' => 'form-control',  ]) !!}
        {!! $errors->first('validation_rules', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    {!! Form::label('comment', 'Коментар', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::textarea('comment', null, ['class' => 'form-control',  ]) !!}
        {!! $errors->first('comment', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('languages_id') ? 'has-error' : ''}}">
    {!! Form::label('languages_id', 'Мова', ['class' => ' control-label']) !!}
    <div class="">
        {!!  Form::select('languages_id', ['uk'=>'Українська','ru'=>'Російська'/*,'en'=>'Англійська'*/,''=>'Мультимовне'], null,['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
        {!! $errors->first('languages_id', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('input_type') ? 'has-error' : ''}}">
    {!! Form::label('input_type', 'Тип поля вводу', ['class' => ' control-label']) !!}
    <div class="">
        {!!  Form::select('input_type', $inputTypes, null,['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
        {!! $errors->first('input_type', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('editable') ? 'has-error' : ''}} ">
    {!! Form::label('editable', 'Чи може редагуватися', ['class' => ' ']) !!}
    <div class="w-100 form-check form-check-inline  flex-wrap">
        <div class="checkbox">
            {!! Form::radio('editable', 1) !!} <label> Так</label>
        </div>
        <div class="checkbox">
            {!! Form::radio('editable', 0, true) !!}<label> Ні</label>
        </div>
        {!! $errors->first('editable', ' <p class="invalid-feedback d-block w-100">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deleteable') ? 'has-error' : ''}} ">
    {!! Form::label('deleteable', 'Чи може видалятися', ['class' => ' ']) !!}
    <div class="w-100 form-check form-check-inline  flex-wrap">
        <div class="checkbox">
            {!! Form::radio('deleteable', 1) !!} <label> Так</label>
        </div>
        <div class="checkbox">
            {!! Form::radio('deleteable', 0, true) !!}<label> Ні</label>
        </div>
        {!! $errors->first('deleteable', ' <p class="invalid-feedback d-block w-100">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>




