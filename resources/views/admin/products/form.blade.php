<div class="form-products-wrapper">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required' , "autocomplete"=>"off"]) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
        {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('order', old("order",isset($product)?$product->order:0), ['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
            {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
        {!! Form::label('quantity', 'Кількість', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('quantity', old("order",isset($product)?$product->quantity:0), ['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
            {!! $errors->first('quantity', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        {!! Form::label('slug', 'Аліас', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('slug', null, ['class' => 'form-control',  "autocomplete"=>"off"]) !!}
            {!! $errors->first('slug', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>



    <div class="form-group {{ $errors->has('vendor_code') ? 'has-error' : ''}}">
        {!! Form::label('vendor_code', 'Артикул', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('vendor_code', null, ['class' => 'form-control', 'required' => 'required', "autocomplete"=>"off"]) !!}
            {!! $errors->first('vendor_code', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : ''}}">
        {!! Form::label('categories_id', 'Категория', ['class' => ' control-label']) !!}
        <div class="">

            <select class="form-control categories_select" name="categories_id" id="categories_id" autocomplete="off">
                @foreach($categories as $item)
                    <option value="{!! $item->id !!}"
                            @if ($item->id == old("categories_id",isset($product)?$product->categories_id:0)) selected  @endif >
                        @for($i = 0 ; $i < $item->depth ; $i++) --  @endfor {{$item->id}}:{{$item->name}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('categories_id', '<p class="invalid-feedback d-block">:message</p>') !!}
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






    <div class="form-group {{ $errors->has('currencies_id') ? 'has-error' : ''}}">
        {!! Form::label('currencies_id', 'Валюта', ['class' => ' control-label']) !!}
        <div class="">
            <select class="form-control" name="currencies_id">
                @foreach($currencies as $item)
                    <option value="{!! $item->id !!}"
                            @if ($item->id == old("currencies_id ",isset($product)?$product->currencies_id :0)) selected @endif >{!!$item->name!!}</option>
                @endforeach
            </select>
            {!! $errors->first('currencies_id', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>



    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
        {!! Form::label('price', 'Ціна ', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::input('','price', old("price",isset($product)?$product->price:0), ['class' => 'form-control input-number', "autocomplete"=>"off",  'required' => 'required']) !!}
            {!! $errors->first('price', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('old_price') ? 'has-error' : ''}}">
        {!! Form::label('old_price', 'Стара ціна ', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::input('','old_price', old("old_price",isset($product)?$product->old_price:0), ['class' => 'form-control input-number', "autocomplete"=>"off",  'required' => 'required']) !!}
            {!! $errors->first('old_price', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>












    <div class="form-group d-none {{ $errors->has('sale') ? 'has-error' : ''}}">
        {!! Form::label('sale', 'Розпродаж', ['class' => ' control-label']) !!}
        <div class="">
            <div class="radio radio-primary   inline-block">
                <label>{!! Form::radio('sale', 1) !!} Так</label>
            </div>
            <div class="radio radio-primary   inline-block">
                <label>{!! Form::radio('sale', 0, true) !!} Ні</label>
            </div>
            {!! $errors->first('sale', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('new') ? 'has-error' : ''}}">
        {!! Form::label('new', 'Новинка', ['class' => ' control-label']) !!}
        <div class="">
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('new', 1) !!} Так</label>
            </div>
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('new', 0, true) !!} Ні</label>
            </div>
            {!! $errors->first('new', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>




    <div class="form-group {{ $errors->has('top') ? 'has-error' : ''}}">
        {!! Form::label('top', 'Топ', ['class' => ' control-label']) !!}
        <div class="">
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('top', 1) !!} Так</label>
            </div>
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('top', 0, true) !!} Ні</label>
            </div>
            {!! $errors->first('top', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>




    <div class="form-group {{ $errors->has('available') ? 'has-error' : ''}}">
        {!! Form::label('available', 'В наявності', ['class' => ' control-label']) !!}
        <div class="">
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('available', 1) !!} Так</label>
            </div>
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('available', 0, true) !!} Ні</label>
            </div>
            {!! $errors->first('available', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="w-100 text-center" >
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>


@push("scripts")
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $(document).ready(function () {
            //CKEDITOR.replace('descri' );
            $.datetimepicker.setLocale('uk');
            $(".replace-datetime").datetimepicker(
                {
                    //timepicker:false,
                    format: 'Y-m-d H:i:s',
                    mask: true
                });

           // jQuery("#price").number(true,2);
            $(".input-number").inputmask('decimal',{rightAlign: false,min:0, max:999999});
            $(".input-number-old").inputmask('decimal',{rightAlign: false,min:0, max:999999});
            $(".input-number-weight").inputmask('decimal',{rightAlign: false,min:0.01, max:999});
            $('.categories_select').select2();

            console.log("ok.google");
        })
    </script>
@endpush
