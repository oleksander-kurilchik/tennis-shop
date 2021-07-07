@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Меню  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Меню</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-success btn-sm"
                   title="">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати нове меню
                </a>

            </div>
            @include('admin.global.message_block')
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 14px;">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>Назва</th>

                        <th>Slug</th>
                        <th style="width: 221px;">Дії</th>
{{--                        <th>Дочірні елементи</th>--}}
                    </tr>
                    </thead>
                    <tbody class="sortable_body" id="category_sortable_body">
                    @foreach($menus as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td> {{ $item->name }}  </td>
                            <td> {{ $item->slug }}  </td>
{{--                            <td>{{ $item->published?"Tak":"Ні"}}</td>--}}
                            <td>

                                @include('admin.menus.button_action',["item"=>$item])
                            </td>
{{--                            <td>--}}
{{--                                <a href="{{route('admin.menus.childrens',['id'=>$item->id])}}">Дочірні--}}
{{--                                    елементи <span class="badge">{{$item->getChildCount()}}</span></a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>


@stop
