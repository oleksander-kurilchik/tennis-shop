@extends('layouts.backend')

@section("sub_title") - Кліенти  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Кліенти</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.frontend_users.create") }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Створити кліента
                </a>
                {!! Form::open(['method' => 'GET', 'url' => route("admin.frontend_users.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                    @include("admin.global.search_input")
                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")
            <div class="table-responsive">
                <table class="table table-striped table-sm" style="word-break: break-all; font-size: 14px">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Імя</th>
                        <th>Email</th>
                        <th>Телефон</th>

                        <th style="width: 150px;">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td style="max-width: 200px">{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td style="max-width: 200px">{{ $item->email}}</td>

                            <td>{{ $item->phone }}</td>

                            {{--                            <td>{{ $item->date_birth}}</td>--}}
                            <td style="width: 150px">

                                <a href="{{ route("admin.frontend_users.show",["id"=>$item->id]) }}" title="Перегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                           aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.frontend_users.edit",["id"=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="{{ route("admin.frontend_users.orders",["id"=>$item->id]) }}"
                                   title="Замовлення">
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-shopping-cart"
                                                                                 aria-hidden="true"></span>
                                    </button>
                                </a>

{{--                                {!! Form::open([--}}
{{--                                    'method'=>'DELETE',--}}
{{--                                    'url' => route("admin.frontend_users.delete",["id"=>$item->id]),--}}
{{--                                    'style' => 'display:inline'--}}
{{--                                ]) !!}--}}
{{--                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(--}}
{{--                                        'type' => 'submit',--}}
{{--                                        'class' => 'btn btn-danger btn-sm',--}}
{{--                                        'title' => 'Видалити',--}}
{{--                                        'onclick'=>'return confirm("Підтвердження видалення?")'--}}
{{--                                )) !!}--}}
{{--                                {!! Form::close() !!}--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div
                    class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
