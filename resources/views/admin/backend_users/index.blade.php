@extends('layouts.backend')
@section("sub_title") - Адміністративний доступ  @endsection
@section('content')

    <div class="card">
        <div class="card-header"> Адміністративний доступ</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_users.create") }}" class="btn btn-success btn-sm"
                   title="Дoдати">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати нового користувача
                </a>

{{--                <a href="{{ route("admin.backend_users.change_password") }}" class="btn btn-success btn-sm"--}}
{{--                   title="Дoдати">--}}
{{--                    <i class="fa fa-key" aria-hidden="true"></i> Змінити пароль--}}
{{--                </a>--}}

                {!! Form::open(['method' => 'GET', 'url' => route("admin.backend_users.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include("admin.global.search_input")
                {!! Form::close() !!}
                @include("admin.global.message_block")
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>
                        <th>@sortablelink('email', 'Email')</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route("admin.backend_users.show",['id'=>$item->id]) }}"
                                   title="Перерегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>

                                <a href="{{ route("admin.backend_users.edit",["id"=>$item->id]) }}" title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                <a href="{{ route("admin.backend_users.change_password",["id"=>$item->id]) }}" title="Змінити пароль">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-key"
                                                                              aria-hidden="true"></i></button>
                                </a>


                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('admin.backend_users.delete',['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $users->appends(  Request::except('page'))->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
