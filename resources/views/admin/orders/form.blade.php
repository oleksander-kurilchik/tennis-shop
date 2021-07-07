<div class="form-products-wrapper">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Призвище, Імя, По батькові', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', 'Email', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('email', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('currency_id') ? 'has-error' : ''}}">
        {!! Form::label('currency_id', 'Валюта', ['class' => ' control-label']) !!}
        <div class="">

            <select class="form-control" name="currency_id">
                @foreach($currencies as $item)
                    <option value="{!! $item->id !!}" {{$item->id == old("currency_id")? 'selected="selected"':''}} >
                        {!!$item->name!!}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('currency_id', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('users_id') ? 'has-error' : ''}}">
        {!! Form::label('users_id', 'Користувач', ['class' => ' control-label']) !!}
        <div class="">

            <select class="form-control select2_orders_search_users" name="users_id">
                <option value=""> Не зареєстрований користувач</option>
            </select>
            {!! $errors->first('users_id', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        {!! Form::label('phone', 'Телефон', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('phone', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manager') ? 'has-error' : ''}}">
        {!! Form::label('manager', 'Менеджер', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('manager', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('manager', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('user_message') ? 'has-error' : ''}}">
        {!! Form::label('user_message', 'Повідомлення користувача', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::textarea('user_message', null, ['class' => 'form-control']) !!}
            {!! $errors->first('user_message', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('order_description') ? 'has-error' : ''}}">
        {!! Form::label('order_description', 'Опис замовлення', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::textarea('order_description', null, ['class' => 'form-control', ]) !!}
            {!! $errors->first('order_description', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="w-100 text-center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var user_select = $('.select2_orders_search_users').select2(
            {
                minimumInputLength: 1,
                // maximumSelectionLength: 6,
                language: "ru",
                // data:data,
                ajax: {
                    method: "GET",
                    url: '{{route('admin.orders.search_users')}}',
                    dataType: 'json',
                    processResults: function (data) {
                        var users = data.data;
                        users.unshift({id: 0, name: "Незареєстрований користувач"});

                        for (var i = 0; i < users.length; i++) {
                            users[i].text = users[i].name;
                        }
                        return {
                            results: users
                        };
                    },
                    data: function (params) {
                        console.log("params", params);
                        var query = {
                            search: params.term
                        };
                        return query;
                    }
                }

            }
        );

        user_select.on('select2:select', function (e) {
            var data = e.params.data;
            console.log("select2:select", data);
            if (data.id == 0) {
                return;
            }
            $("input#name").val(data.name);
            $("input#phone").val(data.phone);
            $("input#email").val(data.email);
            $("input#city").val(data.city);
        });
    });
</script>

