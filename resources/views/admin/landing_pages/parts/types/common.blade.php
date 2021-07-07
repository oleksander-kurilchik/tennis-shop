
<div class="form-group pb-4 {{ $bag->has('classes') ? 'has-error' : ''}}  ">
    {!! Form::label('classes', 'Додаткові css класи', ['class' => ' ']) !!}
    <div class="w-100">
        {!! Form::text('classes', old($old_prefix.".classes"), ['class' => 'form-control'  ]) !!}
        {!! $bag->first('classes', ' <p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group pb-4 {{ $bag->has('styles') ? 'has-error' : ''}}  ">
    {!! Form::label('styles', 'Додаткові css стилі', ['class' => ' ']) !!}
    <div class="w-100">
        {!! Form::textarea('styles', old($old_prefix.".styles"), ['class' => 'form-control' ,'style'=>'height:100px;' ]) !!}
        {!! $bag->first('styles', ' <p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group pb-4 {{ $bag->has('javascript') ? 'has-error' : ''}}  ">
    {!! Form::label('javascript', 'javascript', ['class' => ' ']) !!}
    <div class="w-100">
        {!! Form::textarea('javascript',  old($old_prefix.".javascript"), ['class' => 'form-control' ,'style'=>'height:100px;' ]) !!}
        {!! $bag->first('javascript', ' <p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $bag->has('published') ? 'has-error' : ''}} ">
    {!! Form::label('published', 'Опубліковано', ['class' => ' ']) !!}
    <div class="w-100 form-check form-check-inline  flex-wrap">
         <div class="checkbox">
            <input  {{ old($old_prefix.".published",$item->published) == true? 'checked':''}} name="published" type="radio" value="1" id="published" autocomplete="off"> <label> Так</label>
        </div>
        <div class="checkbox">
            <input  {{ old($old_prefix.".published",$item->published) == false?'checked':''}} name="published" type="radio" value="0" id="published"  autocomplete="off"><label> Ні</label>
        </div>
        {!! $bag->first('published', ' <p class="invalid-feedback d-block w-100">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $bag->has('order') ? 'has-error' : ''}}">
    {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::number('order', old($old_prefix."order",isset($item)?$item->order:0), ['class' => 'form-control order-input']) !!}
        {!! $bag->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
<input type="hidden" value="" name="settings">


<div class="form-group">
    <div class=" w-100 text-center ">
        {!! Form::submit('Оновити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
