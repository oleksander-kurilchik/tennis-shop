@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Елементи меню   @endsection

@section('content')

    <div class=" card">
        <div class="card-header">Елемент меню  {{ $menuItem->id }}</div>
        <div class="card-body">
            <a href="{{ route("admin.menu_item.index",['menu_id'=>$menu->id]) }}" title="Назад ">
                <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </button>
            </a>
             <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $menuItem->id }}</td>
                    </tr>

                    <tr>
                        <th> Назва</th>
                        <td> {{ $menuItem->name}} </td>
                    </tr>
                    <tr>
                        <th> Заголовок uk</th>
                        <td> {{ $menuItem->title_uk}} </td>
                    </tr>
                      <tr>
                        <th> Заголовок ru</th>
                        <td> {{ $menuItem->title_ru}} </td>
                    </tr>

                    <tr>
                        <th> Сортування</th>
                        <td> {{ $menuItem->order }} </td>
                    </tr>
                    <tr>
                        <th> Url uk</th>
                        <td> {{ $menuItem->url_uk }} </td>
                    </tr>
                    <tr>
                        <th> Url ru</th>
                        <td> {{ $menuItem->url_ru }} </td>
                    </tr>
                    <tr>
                        <th>Опубліковано</th>
                        <td>@if($menuItem->published == true) Так @else Ні @endif</td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
