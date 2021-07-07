@extends('layouts.backend')


@section("sub_title") - Товари  @endsection
@section('content')
    <?php
    use Carbon\Carbon;
    ?>

    <div class="card">
        <div class="card-header">Товари</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.products.create") }}" class="btn btn-success btn-sm" title="Додати товар">
                    <i class="fa fa-plus" aria-hidden="true"></i> Створити товар
                </a>

                <div>

                    {!! Form::open(['method' => 'GET', 'url' =>  route("admin.products.index") , 'class' => 'form-group pb4 pt-4', 'role' => 'category'])  !!}
                    <div class="input-group">
                        <select class="form-control" name="category" onchange="form.submit()">
                            <option @if(Request::get('category')==null) selected @endif  autocomplete="off" value="">
                                Всі товари
                            </option>
                            @foreach($categories as $item)
                                <option value="{{$item->id}}"   @if(Request::get('category')==$item->id) selected="selected" @endif
                                        autocomplete="off">  @for($i = 0 ; $i < $item->depth ; $i++) --  @endfor {{$item->name}} </option>
                            @endforeach

                        </select>

                    </div>
                    <div class="pt-3">
                        @include("admin.global.search_input")
                    </div>

                    <div class="form-group form-check">
                        <input name="sale" value="1" type="checkbox" class="form-check-input"
                               id="sale" onchange="form.submit()"
                               @if(Request::get('sale')==true) checked  @endif
                        >
                        <label  class="form-check-label" for="sale">Розпродаж</label>
                    </div>

                    <div class="form-group form-check">
                        <input name="new" value="1" type="checkbox" class="form-check-input"
                               id="new" onchange="form.submit()"
                               @if(Request::get('new')==true) checked  @endif
                        >
                        <label  class="form-check-label" for="new">Новинки</label>
                    </div>


                    {!! Form::close() !!}
                    <div class="input-group">
                        <a href="{{ route("admin.products.index")}}" class="btn btn-primary btn-sm">Скинути фільтри</a>
                    </div>

                </div>
            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr style="font-size: 14px">
                        <th><div class="d-flex align-items-center">@sortablelink('id', 'ID')</div> </th>

                        <th></th>
                        <th><div class="d-flex align-items-center"> @sortablelink('name', 'Назва')</div></th>
                        <th></th>
                        <th><div class="d-flex align-items-center">@sortablelink('vendor_code', 'Артикул')</div></th>
                        <th style="text-align: center;">
                            <div class="d-flex align-items-center"> @sortablelink('vendor_code', 'Сортування')</div>

                        </th>
                        <th><div class="d-flex align-items-center">@sortablelink('slug', 'Посилання')</div></th>
                        <th>
                            <div class="d-flex align-items-center">@sortablelink('price', 'Ціна')</div>
                        </th>

                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr >
                            <td>{{ $item->id }}
                            </td>

                            <td>
                                @if($item->logo != null)
                                    <div class="thumbnail  thumbnail-admin-image"
                                         style="margin-bottom: 0;width: 40px;">
                                        <a href="{{$item->logo->path->path_3x}}" data-lightbox="{{$item->id}}"
                                           data-title="{{$item->logo->path->path_0x}}">
                                            <img src="{{ $item->logo->path->path_3x}}"
                                                 style="width: 40px;height: auto;">
                                        </a>
                                    </div>
                                @endif

                            </td>
                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->name }}</div>
                            </td>
                            <td>




                                <div class="form-check form-check-inline pl-0 pr-0"   data-toggle="tooltip" data-placement="top" title="Приховати/Показати">
                                    <label class="form-check-label pr-1" for="checkPublish{{$item->id}}">
                                     {!! Form::open([
                                  'method' => 'POST',
                                  'url' => route("admin.products.published",["id"=>$item->id]),
                                  'style' => 'display:inline',"class"=>" form-ajax-submit"]) !!}
                                    <input class="form-check-input true-false-and-submit checkbox__show" id="checkPublish{{$item->id}}" autocomplete="off" @if($item->published==true) checked @endif name="checkbox-trigger" value="" type="checkbox">
                                    <i class="fa fa-eye checkbox__label-show" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash checkbox__label-hide" aria-hidden="true"></i>


                                    <input type="hidden" class="checkbox-value" name="published" value="{{$item->published}}">
                                    {!! Form::close() !!}
                                </div>


                            </td>
                            <td>
                                <div style="max-width:100px;word-wrap: break-word;">{{ $item->vendor_code }}</div>
                            </td>
                            <td>
                                <div class="order-field-wrap">
                                    {!! Form::open([
                                   'method' => 'POST',
                                   'url' => route("admin.products.order",["id"=>$item->id]),
                                   'style' => 'display:inline',

                               ]) !!}
                                    {!! Form::number('order', $item->order, ['class' => 'form-control order-input pr-0' ,"style"=>"width:53px",'onchange'=>"form.submit()"]) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td style="max-width:150px;font-size:12px">
                                {{ $item->slug}}
                            </td>
                            <td>
                                <div class="order-field-wrap  "   data-toggle="tooltip" data-placement="top" title="Ціна">
                                    {!! Form::open([
                                   'method' => 'POST',
                                   'url' => route("admin.products.price",["id"=>$item->id]),
                                   'style' => 'display:inline',
                                   "onsubmit"=>' return false',
                                    "class"=>"form-inline d-flex flex-nowrap pl-1 pr-1 form-ajax-submit"

                               ]) !!}
                                    <input class="form-control  form-control-sm pl-0 pr-0 text-center " style="width:70px; " name="price" title="Ціна" value="{{$item->price}}" type="number" autocomplete="off">
                                    <span style="cursor: pointer" onclick="$(this).closest('form').submit()" title="Зберегти ціну"><i class="fa fa-refresh fa-2x text-success" aria-hidden="true"></i></span>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td style="min-width: 130px">
                                <a href="{{route("admin.products.show",['id'=>$item->id])}}" title="Перегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route('admin.products.edit',['id'=>$item->id]) }}" title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('admin.products.delete',['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити продукт',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $products->appends( Request::except(["page","_token"]))!!} </div>

            </div>

        </div>
    </div>

<style>
    .checkbox__show:checked ~ .checkbox__label-hide{
        display: none;
    }
    .checkbox__show:not(:checked) ~ .checkbox__label-show{
        display: none;
    }

</style>
@endsection

@push("scripts")


{{--    <script>--}}
{{--        $(document).ready(function () {--}}


{{--            $(".true-false-and-submit").on('change', function () {--}}
{{--                if ($(this).is(':checked')) {--}}
{{--                    $(this).parent().find(".checkbox-value").attr('value', 1);--}}
{{--                } else {--}}
{{--                    $(this).parent().find(".checkbox-value").attr('value', 0);--}}
{{--                }--}}
{{--                console.log("true-false-and-submit");--}}
{{--                $(this).closest("form").submit();--}}

{{--            });--}}

{{--        })--}}
{{--    </script>--}}

@endpush
