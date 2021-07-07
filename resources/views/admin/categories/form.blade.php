
<div class="form-category-wrapper">
    @if(!isset($category)|| ($category->hasChild()===false))
        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
            {!! Form::label('parent_id', 'Виберіть категорію', ['class' => ' control-label']) !!}
            <div class="">
                <select class="form-control categories_select" name="parent_id">
                    <option value="">Без категории</option>
                    @foreach($categoryList as  $catItem)

                        @if(isset($category))
                            @if( $catItem->id !== $category->id )
                                <option value="{!! $catItem->id!!}"
                                        @if($catItem->id == $category->parent_id) selected @endif>
                                @for($i = 0 ; $i < $catItem->depth ; $i++) --  @endfor
                                    {!!$catItem->name!!}
                                </option>
                            @endif
                        @else
                            <option value="{!! $catItem->id!!}">
                                @for($i = 0 ; $i < $catItem->depth ; $i++) --  @endfor
                                {!!$catItem->name!!}
                            </option>
                        @endif
                    @endforeach
                </select>
                {!! $errors->first('parent_id', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
        </div>
    @elseif(isset($category)&& ($category->hasChild()))
        {!! Form::hidden("parent_id",$category->parent_id) !!}
    @endif
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
        {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('order', old("order",isset($category)?$category->order:0), ['class' => 'form-control order-input']) !!}
            {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        {!! Form::label('slug', 'Аліас', ['class' => ' control-label']) !!}
        <div class="">

            {!! Form::text('slug', null, ['class' => 'form-control' ]) !!}
            {!! $errors->first('slug', '<p class="invalid-feedback d-block">:message</p>') !!}
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
        <div class=" col-md-12" style="text-align: center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>



@push("scripts")
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $(document).ready(function () {

            $('.categories_select').select2();


        })
    </script>
@endpush
