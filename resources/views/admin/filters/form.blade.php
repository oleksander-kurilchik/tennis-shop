<div class="form-products-wrapper">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
        {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('order', old("order",isset($filter)?$filter->order:0), ['class' => 'form-control', 'required' => 'required']) !!}
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


{{--    <div class="form-group {{ $errors->has('categories_id') ? 'has-error' : ''}}">--}}
{{--        {!! Form::label('categories_id', 'Категория', ['class' => ' control-label']) !!}--}}
{{--        <div class="">--}}

{{--            <select class="form-control" name="categories_id" id="categories_id">--}}
{{--                @foreach($categories as $item)--}}
{{--                    <option value="{!! $item->id !!}"--}}
{{--                            @if ($item->id == old("categories_id",isset($filter)?$filter->categories_id:0))--}}
{{--                            selected--}}
{{--                            @endif >--}}
{{--                        {!!$item->getLevelName()!!}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            {!! $errors->first('categories_id', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group">
        <div class="w-100 text-center" >
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

