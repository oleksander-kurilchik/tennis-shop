@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Меню  @endsection

@section('content')

    <div class=" card">
        <div class="card-header">Меню {{ $menu->id }}</div>
        <div class="card-body">
            <a href="{{ route("admin.menus.index") }}" title="Назад ">
                <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </button>
            </a>
            @include("admin.menus.button_action",["item"=>$menu])

            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $menu->id }}</td>
                    </tr>
                    <tr>
                        <th>Батківське меню</th>
                        <td> {{ $menu->getParentLevelName()}} </td>
                    </tr>
                    <tr>
                        <th> Назва</th>
                        <td> {{ $menu->name}} </td>
                    </tr>
                    <tr>
                        <th> Заголовок uk</th>
                        <td> {{ $menu->title_uk}} </td>
                    </tr>
                      <tr>
                        <th> Заголовок ru</th>
                        <td> {{ $menu->title_ru}} </td>
                    </tr>

                    <tr>
                        <th> Сортування</th>
                        <td> {{ $menu->order }} </td>
                    </tr>
                    <tr>
                        <th> Url uk</th>
                        <td> {{ $menu->url_uk }} </td>
                    </tr>
                    <tr>
                        <th> Url ru</th>
                        <td> {{ $menu->url_ru }} </td>
                    </tr>
                    <tr>
                        <th>Опубліковано</th>
                        <td>@if($menu->published == true) Так @else Ні @endif</td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
