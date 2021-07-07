@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Категорії  @endsection

@section('content')
         <div class="card">
            <div class="card-header">Категорії</div>
            <div class="card-body">

                <div class="header-admin-button">
                <a href="{{ route("admin.categories.create") }}" class="btn btn-success btn-sm"
                   title="Add New Category">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати нову
                </a>
                    <a href="{{ route("admin.categories.edit-categories-hierarchy") }}" class="btn btn-success btn-sm"
                       title="">
                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Змінити Іерархію
                    </a>


                {!! Form::open(['method' => 'GET', 'url' => route("admin.categories.index"), 'class' => 'form-group pb4 pt-4', 'role' => 'search'])  !!}
                    @include("admin.global.search_input")
                {!! Form::close() !!}
                </div>
                @include("admin.global.message_block")
                <div class="table-responsive">
                    <table class="table table-striped" style="font-size: 14px;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th style="max-width: 150px">Назва</th>
                            <th>Сорт.</th>
                            <th>Опуб.</th>
                            <th  style="max-width: 150px">Посилання</th>
                            <th style="max-width: 100px;min-width: 100px;">Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->logo != null)
                                        <div class="thumbnail  thumbnail-admin-image"
                                             style="margin-bottom: 0;width: 40px;">
                                            <a href="{{$item->logo->big_path}}" data-lightbox="{{$item->id}}"
                                               data-title="{{$item->logo->small_path}}">
                                                <img src="{{ $item->logo->small_path }}"
                                                     style="width: 40px;height: auto;">
                                            </a>
                                        </div>
                                    @endif

                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="order-field-wrap">
                                        {!! Form::open([
                                       'method' => 'POST',
                                       'url' => route("admin.categories.order",["id"=>$item->id]),
                                       'style' => 'display:inline-block;max-width:50px;',

                                   ]) !!}
                                        {!! Form::number('order', $item->order, ['class' => 'form-control order-input px-0 text-center','onchange'=>"form.submit()"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                                <td>{{ $item->published?"Tak":"Ні"}}</td>
                                <td>{{ $item->slug }}</td>
                                <td style="max-width: 100px;min-width: 100px;">

                                    @include("admin.categories.category_button_action",["item"=>$item])
                                </td>
{{--                                <td>--}}

{{--                                        <a href="{{route("admin.categories.childrens",["id"=>$item->id])}}">Дочірні--}}
{{--                                            елементи <span class="badge">--}}
{{--                                                {{$item->childrens()->count()}}--}}
{{--                                            </span>--}}
{{--                                        </a>--}}

{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <span class="badge">--}}
{{--                                        {{$item->getProductCount()}}--}}
{{--                                    </span>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $categories->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>

@stop
@push("scripts")
<script>
    $(document).ready(function () {

        $(".true-false-and-submit").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).parent().find(".checkbox-value").attr('value', 1);
            } else {
                $(this).parent().find(".checkbox-value").attr('value', 0);
            }


            console.log("true-false-and-submit");

            $(this).closest("form").submit();

        });
    })
</script>
@endpush
