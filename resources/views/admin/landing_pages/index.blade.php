@extends('layouts.backend')

@section("sub_title") - Лендинги  @endsection

@section('content')
    <div class="card admin-card">
        <div class="card-header admin-card__header">Лендинги</div>
        <div class="card-body  admin-card__body">
            <div class="header-admin-button">
                <a href="{{ route("admin.landing_pages.create") }}" class="btn btn-success btn-sm"
                   title="Додати нову марку">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати новий
                </a>
                {!! Form::open(['method' => 'GET', 'url' => route("admin.landing_pages.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include("admin.global.search_input")

                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")
            <div style="clear: both"></div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
                        <th>Опубліковано</th>
                        <th>Посилання</th>
                        <th style="width: 221px;">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($landing_pages as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->published?"Tak":"Ні"}}</td>
                            <td>{{ $item->slug }}</td>
                            <td>
                                {{--@include("admin.landing_pages.category_button_action",["item"=>$item])--}}

                                <a href="{{ route("admin.landing_pages.show",["id"=>$item->id]) }}" title="Перегляд">
                                    <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                           aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.landing_pages.edit",["id"=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-xs"><span class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true"></span>
                                    </button>
                                </a>

                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.landing_pages.delete",["id"=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердження видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $landing_pages->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
