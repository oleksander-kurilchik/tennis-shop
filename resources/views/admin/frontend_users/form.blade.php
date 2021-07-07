<div class="form-pages-wrapper">


    <div class="form-group ">
        {!! Form::label('last_name', trans('profile.edit.form.last_name.title'),
            ['class' => 'form-control__label']) !!}
        {!! Form::text('last_name',null, ['autocomplete'=>'off', 'class' => 'form-control' ,'placeholder'=>trans('profile.edit.form.last_name.placeholder')] ) !!}
        {!! $errors->first('last_name', ' <div class="invalid-feedback d-block"> :message </div>') !!}

    </div>


    <div class="form-group ">
        {!! Form::label('first_name', trans('profile.edit.form.first_name.title'), ['class' => 'form-control__label']) !!}
        {!! Form::text('first_name',null, ['autocomplete'=>'off', 'class' => 'form-control','placeholder'=>trans('profile.edit.form.first_name.placeholder')] ) !!}
        {!! $errors->first('first_name', ' <div class="invalid-feedback d-block"> :message </div>') !!}

    </div>


{{--    <div class="form-group ">--}}
{{--        {!! Form::label('patronymic', trans('profile.edit.form.patronymic.title'), ['class' => 'form-control__label']) !!}--}}
{{--        {!! Form::text('patronymic',null, ['autocomplete'=>'off', 'class' => 'form-control','placeholder'=>trans('profile.edit.form.patronymic.placeholder')] ) !!}--}}
{{--        {!! $errors->first('patronymic', ' <div class="invalid-feedback d-block"> :message </div>') !!}--}}
{{--    </div>--}}


    <div class="form-group pb-4 {{ $errors->has('email') ? 'has-error' : ''}}  ">
        {!! Form::label('email', 'email', ['class' => ' ']) !!}
        {!! Form::email('email', null, ['class' => 'form-control'  ]) !!}
        {!! $errors->first('email', ' <p class="invalid-feedback d-block">:message</p>') !!}
    </div>


    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}} ">
        {!! Form::label('phone', 'Телефон', ['class' => ' ']) !!}
        <div>
            {!! Form::text('phone', null, ['class' => 'form-control' ]) !!}
            {!! $errors->first('phone', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>










{{--    <div class="form-group {{ $errors->has('email_verified_at') ? 'has-error' : ''}} ">--}}
{{--        {!! Form::label('email_verified_at', 'Дата верифікації', ['class' => '  ']) !!}--}}
{{--        <div>--}}
{{--            {!! Form::text('email_verified_at', null, ['class' => 'form-control replace-date-email-verify_at' ]) !!}--}}
{{--            {!! $errors->first('email_verified_at', ' <p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        {!! Form::label('status', 'Статус', ['class' => ' control-label']) !!}
        {!! Form::select('status', ['active'=>'Активний','blocked'=>'Заблокований'] , null , ['class' => 'form-control ']) !!}
            {!! $errors->first('status', '<p class="invalid-feedback d-block">:message</p>') !!}

    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
        {!! Form::label('password', 'Пароль', ['class' => ' ']) !!}
        <div>
            {!! Form::password('password', ['class' => 'form-control ',"autocomplete"=>"off" ]) !!}
            {!! $errors->first('password', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
        {!! Form::label('password_confirmation', 'Пароль повторити', ['class' => ' ']) !!}
        <div>
            {!! Form::password('password_confirmation', ['class' => 'form-control ',"autocomplete"=>"off" ]) !!}
            {!! $errors->first('password_confirmation', ' <p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class=" w-100 text-center " style="text-align: center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


</div>



@push("scripts")
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $(document).ready(function () {

            $.datetimepicker.setLocale('uk');
            $(".replace-date").datetimepicker(
                {
                    //timepicker:false,
                    format: 'Y-m-d'
                    //mask: true
                });


            $(".replace-date-email-verify_at").datetimepicker(
                {
                    //timepicker:false,
                    format: 'Y-m-d H:i:s'
                    //mask: true
                });


                if( $('.js-p-account-edit-data__country-select').val()==1){
                    $('.js-p-account-edit-data__form-col-regions').removeClass('d-none');

                }

                $('.js-p-account-edit-data__country-select').change(function () {
                    if($(this).val()==1){
                        $('.js-p-account-edit-data__form-col-regions').removeClass('d-none');
                     }
                    else {
                        $('.js-p-account-edit-data__form-col-regions').addClass('d-none');
                     }
                });

        })


    </script>
@endpush

