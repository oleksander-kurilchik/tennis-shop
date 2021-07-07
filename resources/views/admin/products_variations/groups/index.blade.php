@extends('layouts.backend')


@section("sub_title") - Групи товарів : {{$product->id}} - {{$product->name}}  @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Групи товарів : {{$product->id}} - {{$product->name}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.products.edit",["id"=>$product->id]) }}" class="btn btn-warning btn-sm"
                   title="Назад до продукту">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до продукту
                </a>

                <a href="{{ route("admin.products_variations.groups.create",["products_id"=>$product->id]) }}"
                   class="btn btn-success btn-sm"
                   title="Назад до продукту">
                    <i class="fa fa-plus" aria-hidden="true"></i> Створити групу товарів для даного товару
                </a>

            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>

                        <th>@sortablelink('published', 'Опубліковано')</th>
                        <th>@sortablelink('order', 'Сортування')</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $item)
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->name }}</div>
                            </td>
                            <td>

                                @if($item->published == true )
                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                @else
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>

                                @endif

                            </td>

                            <td>
                                <div class="order-field-wrap">
                                    {{$item->order}}
                                    {{--                                    {!! Form::open([--}}
                                    {{--                                   'method' => 'POST',--}}
                                    {{--                                   'url' => route("admin.filters.order",["id"=>$item->id]),--}}
                                    {{--                                   'style' => 'display:inline',--}}
                                    {{--                                    'class'=>"form-ajax-submit",--}}
                                    {{--                                   "autocomplete"=>"off"--}}

                                    {{--                               ]) !!}--}}
                                    {{--                                    {!! Form::number('order', $item->order, ['class' => 'form-control order-input pr-0' ,"style"=>"width:53px","onChange"=>"$(this).closest('form').submit()"]) !!}--}}
                                    {{--                                    {!! Form::close() !!}--}}
                                </div>
                            </td>

                            <td style="min-width: 130px">
                                {{--                                <a href="{{route("admin.filters.show",["id"=>$item->id])}}" title="Перегляд">--}}
                                {{--                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>--}}
                                {{--                                    </button>--}}
                                {{--                                </a>--}}
                                <a href="{{ route("admin.products_variations.groups.edit",["id"=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.products_variations.groups.delete",["id"=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити фільтр',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                {{--            <div class="group-list">--}}
                {{--                @foreach($groups as $group)--}}
                {{--                    @include('admin.products_variations.groups.parts.index.group_item',['group'=>$group])--}}
                {{--                @endforeach--}}
                {{--            </div>--}}


            </div>
        </div>
    </div>


@endsection




