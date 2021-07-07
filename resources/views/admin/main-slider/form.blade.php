<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва - (лише для адмінки)', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">--}}
{{--    {!! Form::label('title', 'Заголовок', ['class' => ' control-label']) !!}--}}
{{--    <div class="">--}}
{{--        {!! Form::textarea('title', null, ['class' => 'form-control   ckeditor', 'required' => 'required']) !!}--}}
{{--        {!! $errors->first('title', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--    </div>--}}
{{--</div>--}}

<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'Url', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('url', null, ['class' => 'form-control',  ]) !!}
        {!! $errors->first('url', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

{{--<div class="form-group {{ $errors->has('url_text') ? 'has-error' : ''}}">--}}
{{--    {!! Form::label('url_text', 'Текст кнопки', ['class' => ' control-label']) !!}--}}
{{--    <div class="">--}}
{{--        {!! Form::text('url_text', null, ['class' => 'form-control',  ]) !!}--}}
{{--        {!! $errors->first('url_text', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">--}}
{{--    {!! Form::label('description', 'Опис', ['class' => ' control-label']) !!}--}}
{{--    <div class="">--}}
{{--        {!! Form::textarea('description', null, ['class' => 'form-control simple-ckeditor-replace__', 'required' => 'required']) !!}--}}
{{--        {!! $errors->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--    </div>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('published') ? 'has-error' : ''}}">
    {!! Form::label('published', 'Опубліковано', ['class' => ' control-label']) !!}
    <div class="">
        <div class="radio ">
            <label>{!! Form::radio('published', 1) !!} Так</label>
        </div>
        <div class="radio">
            <label>{!! Form::radio('published', 0, true) !!} Ні</label>
        </div>
        {!! $errors->first('published', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::number('order', old('order',isset($mainslider)?$mainslider->order:0), ['class' => 'form-control']) !!}
        {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('languages_id') ? 'has-error' : ''}}">
    {!! Form::label('languages_id', 'Мова', ['class' => ' control-label']) !!}
    <div class="">
        <select name="languages_id" class="form-control" autocomplete="off">
            <option value="" default>Мультимовний</option>
            @foreach($languages as $lang)
                @if (old('languages_id',isset($mainslider)?$mainslider->languages_id:null ) == $lang->id)
                    <option value="{{ $lang->id }}" selected>{{ $lang->name }}</option>

                @else
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endif
            @endforeach
        </select>
        {!! $errors->first('languages_id', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Зображення для слайдера', ['class' => ' control-label']) !!}
    <div class="">
        <input class="form-control-file" name="image" id="image" type="file"
               @if(!isset($mainslider))required="required" @endif >
        {!! $errors->first('image', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('image_sm') ? 'has-error' : ''}}">
    {!! Form::label('image_sm', 'Зображення для слайдера sm', ['class' => ' control-label']) !!}
    <div class="">
        <input class="form-control-file" name="image_sm" id="image_sm" type="file"
               @if(!isset($mainslider))required="required" @endif >
        {!! $errors->first('image_sm', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<div class="snippet-output" data-id="snippet-events"></div>
@if(isset($mainslider))
    <div class="form-group pt-4 pb-4 ">
        {!! Form::label('image', 'Зображення ', ['class' => ' control-label']) !!}

        <div class="col-md-12">
            <img style="max-width: 100%;height: auto" src="{!! $mainslider->image->path_1x !!}"></div>
    </div>
@endif


<div class="snippet-output" data-id="snippet-events"></div>
@if(isset($mainslider))
    <div class="form-group pt-4 pb-4 ">
        {!! Form::label('image', 'Зображення sm ', ['class' => ' control-label']) !!}

        <div class="col-md-12">
            <img style="max-width: 100%;height: auto" src="{!!  $mainslider->imageSm->path_1x !!}"></div>
    </div>
@endif





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
        })
    </script>
    <script>

        $(function () {
            var colorInputs = $('.replace_colorpicker').wheelColorPicker({
                preview: true, format: 'rgba', quality: 0.2
            });
            setTimeout(function () {
                colorInputs.trigger('change');
            }, 200)
        });
    </script>
@endpush
