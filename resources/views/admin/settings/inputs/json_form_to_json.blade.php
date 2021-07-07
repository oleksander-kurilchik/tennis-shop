<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Значення', ['class' => ' control-label']) !!}
    <div class="">


        {!! Form::textarea('value', null, ['class' => 'form-control d-none ','readonly'=>'readonly' ,'autocomplete'=>'off' ]) !!}
        {!! Form::textarea('input_type_settings', null, ['id'=>'input_type_settings','class' => 'form-control d-none'  ,'autocomplete'=>'off' ]) !!}
        <div id="inputJsonForm"></div>


        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


@push('scripts')

    <script>

        window.updateJsonValue = function () {
            var values = $('#inputJsonForm').jsonFormValue();
            console.log('values', values);
            $jsonString = JSON.stringify(values,null , 2);
            $('#value').val($jsonString);
        }
        $(document).ready(function () {
            console.log("raw value",$('#value').val() );
            var oldValue = {};
            try {
               oldValue = $.parseJSON($('#value').val());
            } catch (e) {
                console.log("exception 1 ",e)
            }

            var $form = {};
            $formJson = $('#input_type_settings').val();
            console.log("formJson",$formJson);
            try {
                $form = $.parseJSON($formJson);
            } catch (e) {
                console.log("exception 2 ",e)
            }
            $form.value = oldValue;

            console.log("Show form value",JSON.stringify( $form,null,4));
            window.jsonFormElement = $('#inputJsonForm').jsonForm($form);
            var $element = $(jsonFormElement.domRoot);
            $element.find('input,textarea').on("input", updateJsonValue);


        });
    </script>



@endpush
