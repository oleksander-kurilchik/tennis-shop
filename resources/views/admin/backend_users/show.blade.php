@extends('layouts.backend')
@section("sub_title") - Административний доступ @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Административний доступ - користувач - "{{$user->name}}" #{{ $user->id }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route('admin.backend_users.index')}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>


            </div>

            @include('admin.global.message_block')

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
                        <th> Тип користувача</th>
                        <td>
                            @switch($user->user_type)
                                @case('super_admin')
                                    Божество
                                @break
                                @case('admin')
                                    Адміністратор
                                @break
                                @case('manager')
                                    Менеджер
                                @break

                            @endswitch

                        </td>
                    </tr>
                    <tr>
                        <th> Створено</th>
                        <td> {{ $user->created_at }} </td>
                    </tr>
                    <tr>
                        <th> Оновлено</th>
                        <td> {{ $user->updated_at }} </td>
                    </tr>




                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
