@extends('layouts.backend')
@section("sub_title") - Особистий кабінет адмін-панелі @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Особистий кабінет адмін-панелі - "{{$user->name}}" : {{ $user->email }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_account.edit" )}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>Редагувати особисті дані
                    </button>
                </a>

                <a href="{{ route("admin.backend_account.edit-password" )}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-key" aria-hidden="true"></i>Змінити пароль
                    </button>
                </a>

            </div>
            @include("admin.global.message_block")

            <div class="table table-striped">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Назва</th>
                        <td> {{ $user->name }} </td>
                    </tr>
                    <tr>
                        <th> Email</th>
                        <td> {{ $user->email }} </td>
                    </tr>

                    <tr>
                        <th>Дата створення</th>
                        <td> {{ $user->created_at }} </td>
                    </tr>

                    <tr>
                        <th> Телефон</th>
                        <td> {{ $user->phone }} </td>
                    </tr>

                    <tr>
                        <th> Назва Uk</th>
                        <td> {{ $user->name_uk }} </td>
                    </tr>


                    <tr>
                        <th> Назва Ru</th>
                        <td> {{ $user->name_ru }} </td>
                    </tr>

                    <tr>
                        <th> Назва En </th>
                        <td> {{ $user->name_en }} </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
