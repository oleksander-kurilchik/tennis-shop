@extends('layouts.backend')




@section("sidebar")
    @include('admin.sidebar')
@stop

@section("sub_title") - меню  @endsection


@section('content')

        <div class=" card">
            <div class="card-header">Редагувати меню #{{ $menu->id }}</div>
            <div class="card-body">
                <div class="header-admin-button py-2">
                <a href="{{ route("admin.menus.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>

                    <a href="{{ route("admin.menu_item.index",['menu_id'=>$menu->id]) }}" title="Назад ">
                        <button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i>
                            Конструктор меню
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li class="nav-item " ><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна інформація</a></li>
                </ul>
                <div class="tab-content">
                    <div id="main_inf" class="tab-pane fade show active pt-4">
                        {!! Form::model($menu, [
                            'method' => 'PATCH',
                            'url' => route("admin.menus.update",["id"=>$menu->id]),
                            'class' => 'form-horizontal  form-admin',
                            'files' => true
                        ]) !!}
                        @include ('admin.menus.form', ['submitButtonText' => 'Оновити'])
                        {!! Form::close() !!}
                    </div>

             </div>
        </div>


@endsection
