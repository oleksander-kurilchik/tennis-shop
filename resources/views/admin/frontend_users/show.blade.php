@extends('layouts.backend')

@section("sub_title") - Кліенти  @endsection

@section('content')

    <div class="card">
        <div class="card-header">Кліент {{ $user->id }} - "{{$user->email}}"</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.frontend_users.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>
                <a href="{{  route("admin.frontend_users.edit",["id"=>$user->id]) }}"
                   title="Редагувати">
                    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                                 aria-hidden="true"></span>
                    </button>
                </a>
{{--                {!! Form::open([--}}
{{--                    'method'=>'DELETE',--}}
{{--                    'url' =>  route("admin.frontend_users.delete",["id"=>$user->id]) ,--}}
{{--                    'style' => 'display:inline'--}}
{{--                ]) !!}--}}
{{--                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(--}}
{{--                        'type' => 'submit',--}}
{{--                        'class' => 'btn btn-danger btn-sm',--}}
{{--                        'title' => 'Видалити',--}}
{{--                        'onclick'=>'return confirm("Підтвердження видалення?")'--}}
{{--                )) !!}--}}
{{--                {!! Form::close() !!}--}}
            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <th> Імя</th>
                        <td> {{ $user->first_name}} </td>
                    </tr>
                    <tr>
                        <th> Прізвище</th>
                        <td> {{ $user->last_name}} </td>
                    </tr>
                    <tr>
                        <th> По батькові</th>
                        <td> {{ $user->patronymic}} </td>
                    </tr>
                    <tr>
                        <th> Email</th>
                        <td> {{ $user->email }} </td>
                    </tr>
                    <tr>
                        <th> Телефон</th>
                        <td> {{ $user->phone }} </td>
                    </tr>

                    <tr>
                        <th> Країна</th>
                        <td> {{ $user->country?$user->country->name:'' }} </td>
                    </tr>
                    <tr>
                        <th> Регіон</th>
                        <td> {{  $user->region?$user->region->name:''}} </td>
                    </tr>
                    <tr>
                        <th> Місто</th>
                        <td> {{ $user->city }} </td>
                    </tr>
                    <tr>
                        <th> Компанія</th>
                        <td> {{ $user->company }} </td>
                    </tr>

                    <tr>
                        <th> Кількість магазинів</th>
                        <td> {{ $user->stores_number }} </td>
                    </tr>

                    <tr>
                        <th> Адреса</th>
                        <td> {{ $user->address  }} </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
 @endsection
