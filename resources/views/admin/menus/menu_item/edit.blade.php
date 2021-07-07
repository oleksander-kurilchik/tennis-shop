@extends('layouts.backend')




@section("sidebar")
    @include('admin.sidebar')
@stop

@section("sub_title") - Елементи меню   @endsection


@section('content')

    <div class=" card">
        <div class="card-header">Редагувати елемент меню #{{ $menuItem->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.menu_item.index",['menu_id'=>$menu->id]) }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>

                @include("admin.global.message_block")
            </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна
                            інформація</a></li>
                </ul>
                <div class="tab-content">
                    <div id="main_inf" class="tab-pane fade show active pt-4">
                        {!! Form::model($menuItem, [
                            'method' => 'PATCH',
                            'url' => route("admin.menu_item.update",["id"=>$menuItem->id,'menu_id'=>$menu->id]),
                            'class' => 'form-horizontal  form-admin',
                            'files' => true
                        ]) !!}
                        @include ('admin.menus.menu_item.form', ['submitButtonText' => 'Оновити'])
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>


@endsection
