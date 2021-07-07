@extends('layouts.backend')


@section("sub_title") - Атрибути товару: {{$product->name}}   @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Атрибути товару: {{$product->name}} </div>
        <div class="card-body">
            <div class="header-admin-button">
                                <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="btn btn-success btn-sm"
                                   title="">
                                    <i class="fa fa-backward" aria-hidden="true"></i> Повернутися до товару
                                </a>
                <div>


                </div>
            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr style="font-size: 14px">
                        <th>
                            <div class="d-flex align-items-center"> ID</div>
                        </th>


                        <th>
                            <div class="d-flex align-items-center"> Назва групи</div>
                        </th>
                        <th>
                            <div class="d-flex align-items-center"> Назва атрибута</div>
                        </th>
                        <th>
                            <div class="d-flex align-items-center"> Сортування</div>
                        </th>
                        <th>
                            <div class="d-flex align-items-center"> Значення Uk</div>
                        </th>
                        <th>
                            <div class="d-flex align-items-center"> Значення Ru</div>
                        </th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($values as $item)
                        <tr class="js-pivot-row" data-id="{{$item->id}}">
                            <td style=";width: 60px">{{ $item->id }} </td>
                            <td style="font-size: 12px;width: 100px">
                                <div>{{ $item->group_name }}</div>
                            </td>
                            <td style="font-size: 12px;width: 100px">
                                <div style=" ">{{ $item->attribute_name }}</div>
                            </td>
                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->order }}</div>
                            </td>

                            <td style="font-size: 12px">
                                <div
                                    style="max-width: 100px">{{ $item->getTranslation('value_text', 'uk',false) }}</div>
                            </td>
                            <td style="font-size: 12px">
                                <div
                                    style="max-width: 100px">{{ $item->getTranslation('value_text', 'ru',false) }}</div>
                            </td>

                            <td style=" width: 130px">

                                {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> ', array(
                                       'type' => 'button',
                                       'class' => 'btn btn-primary btn-sm js-button-show-edit',
                                       'title' => 'Редагувати  елемент',
                                       'data-id'=>$item->id

                               )) !!}
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('admin.products_attributes.pivot.delete',['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Видалити елемент',
                                                'onclick'=>'return confirm("Підтвердити видалення?")'
                                        )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                        <tr class="js-pivot-form d-none" data-id="{{$item->id}}">
                            <td colspan="7" class="p-0">
                                <form method="post" action="{{route('admin.products_attributes.pivot.update',['id'=>$item->id])}}">
                                    @csrf
                                    @method('PATCH')
                                    <table class="table table-striped m-0">
                                        <tbody>
                                        <tr>
                                            <td style=";width: 60px">
                                                {{ $item->id }}
                                                <input name="id" type="hidden" value="{{ $item->id }}">
                                            </td>
                                            <td style=";width: 100px">
                                                <div style=" font-size: 12px ">{{ $item->group_name }}</div>
                                            </td>
                                            <td style=";width: 100px">
                                                <div
                                                    style="max-width: 100px; font-size: 12px ">{{ $item->attribute_name }}</div>
                                            </td>
                                            <td>
                                                <div style="max-width: 100px">
                                                    <input class="form-control form-control-sm" name="order" required
                                                           type="number" value="{{$item->order}}">
                                                </div>
                                            </td>
                                            <td>
                                                <div style="max-width: 100px">
                                                    <input class="form-control form-control-sm" type="text"
                                                           required name="value_text[uk]"
                                                           value="{{$item->getTranslation('value_text', 'uk',false)}}">
                                                </div>
                                            </td>
                                            <td>
                                                <div style="max-width: 100px">
                                                    <input class="form-control form-control-sm" type="text"
                                                           required name="value_text[ru]"
                                                           value="{{$item->getTranslation('value_text', 'ru',false)}}">
                                                </div>
                                            </td>
                                            <td style="width: 130px">
                                                <div>
                                                    {!! Form::button('<i class="fa fa-save" aria-hidden="true"></i> ', array(
                                                             'type' => 'submit',
                                                             'class' => 'btn btn-primary btn-sm',
                                                             'title' => 'Редагувати  елемент',

                                                     )) !!}
                                                    {!! Form::button('<i class="fa fa-close" aria-hidden="true"></i> ', array(
                                                   'type' => 'button',
                                                   'class' => 'btn btn-primary btn-sm js-button-close-edit',
                                                   'title' => 'Відмінити редагування',
                                                   'data-id'=>$item->id

                                                   )) !!}

                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <form class="card" method="post"
                      action="{{route('admin.products_attributes.pivot.store',['products_id'=>$product->id])}}">
                    @csrf
                    <div class="card-header">
                        Додати значення
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="form-group {{ $errors->has('product_attribute_id') ? 'has-error' : ''}}">
                            {!! Form::label('product_attribute_id', 'Атрибут', ['class' => ' control-label']) !!}
                            <div class="">
                                {!!  Form::select('product_attribute_id', $groupSelect,null,['class'=>'form-control js-attributes-select2']); !!}
                                {!! $errors->first('product_attribute_id', '<p class="invalid-feedback d-block">:message</p>') !!}
                            </div>
                        </div>
                        @foreach($languages as $language)
                            <div
                                class="form-group {{ $errors->has('value_text.'.$language->value) ? 'has-error' : ''}}">
                                {!! Form::label('', 'Значення - '. $language->name  , ['class' => ' control-label']) !!}
                                <div class="">
                                    {!! Form::text("value_text[{$language->value}]", old("value_text[{$language->value}]"), ['class' => 'form-control', 'required' => 'required' , 'autocomplete'=>'off']) !!}
                                    {!! $errors->first("value_text[{$language->value}]", '<p class="invalid-feedback d-block">:message</p>') !!}
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
                            {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
                            <div class="">
                                {!! Form::number('order', old('order',0), ['class' => 'form-control', "autocomplete"=>"off", 'required' => 'required']) !!}
                                {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-100 text-center">
                                {!! Form::submit(  'Створити', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <style>
        .max-100px {
            max-width: 100px;
        }
        .select2-container{
         max-width: 100%;
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.js-attributes-select2').select2();
            //js-pivot-row
            //js-pivot-form
        })


        $(document).ready(function () {
            $('.js-button-show-edit').click(function () {
              var data_id = $(this).attr('data-id');
               $('.js-pivot-row').removeClass('d-none') ;
               $('.js-pivot-form').addClass('d-none') ;
                $('.js-pivot-row[data-id="'+data_id+'"]').addClass('d-none') ;
                $('.js-pivot-form[data-id="'+data_id+'"]').removeClass('d-none') ;


            })
            $('.js-button-close-edit').click(function () {
                var data_id = $(this).attr('data-id');
                $('.js-pivot-row[data-id="'+data_id+'"]').removeClass('d-none') ;
                $('.js-pivot-form[data-id="'+data_id+'"]').addClass('d-none') ;
            })
        })
    </script>


@endpush

