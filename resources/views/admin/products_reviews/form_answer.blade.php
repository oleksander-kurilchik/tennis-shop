<div class="form-products-wrapper">
    <div class="form-group {{ $errors->getBag("products_reviews_answer")->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => 'control-label']) !!}
        <div class="">
            {!! Form::text('name', old("products_reviews_answer.name"), ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->getBag("products_reviews_answer")->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->getBag("products_reviews_answer")->has('user_name') ? 'has-error' : ''}}">
        {!! Form::label('user_name', 'Назва user', ['class' => 'control-label']) !!}
        <div class="">
            {!! Form::text('user_name', old("products_reviews_answer.user_name"), ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->getBag("products_reviews_answer")->first('user_name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->getBag("products_reviews_answer")->has('published') ? 'has-error' : ''}}">
        {!! Form::label('published', 'Опубліковано', ['class' => 'control-label']) !!}
        <div class="">
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('published', 1) !!} Так</label>
            </div>
            <div class="radio radio-primary inline-block">
                <label>{!! Form::radio('published', 0, true) !!} Ні</label>
            </div>
            {!! $errors->getBag("products_reviews_answer")->first('published', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->getBag("products_reviews_answer")->has('date_answer') ? 'has-error' : ''}}">
        {!! Form::label('date_answer', 'Дата публікації', ['class' => 'control-label ']) !!}
        <div class="">
            {!! Form::input('', 'date_answer', old("products_reviews_answer.date_answer"), ['class' => 'form-control replace-datetime', 'required' => 'required']) !!}
            {!! $errors->getBag("products_reviews_answer")->first('date_answer', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->getBag("products_reviews_answer")->has('description') ? 'has-error' : ''}}">
        {!! Form::label('description', 'Опис', ['class' => 'control-label']) !!}
        <div class="">
            {!! Form::textarea('description', old("products_reviews_answer.description"), ['class' => 'form-control description ckeditor ckeditor-area',]) !!}
            {!! $errors->getBag("products_reviews_answer")->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12" style="text-align: center">
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
                    timepicker:false,
                    format: 'Y-m-d',
                    mask: true
                });
        })
    </script>
@endpush
