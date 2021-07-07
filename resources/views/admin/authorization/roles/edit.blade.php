@extends('layouts.backend')


@section("sub_title") - Ролі  @endsection


@section('content')

        <div class=" card">
            <div class="card-header">Редагувати роль #{{ $role->id }}</div>
            <div class="card-body">
                <div class="header-admin-button py-2">
                <a href="{{ route("admin.roles.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>

                    <a href="{{ route("admin.roles_permissions.index",['roles_id'=>$role->id]) }}" title="Назад ">
                        <button class="btn btn-success btn-sm"><i class="fa fa-key" aria-hidden="true"></i>
                            Права
                        </button>
                    </a>

                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li class="nav-item " ><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна інформація</a></li>
                </ul>
                <div class="tab-content">
                    <div id="main_inf" class="tab-pane fade show active pt-4">
                        {!! Form::model($role, [
                            'method' => 'PATCH',
                            'url' => route("admin.roles.update",["id"=>$role->id]),
                            'class' => 'form-horizontal  form-admin',
                            'files' => true
                        ]) !!}
                        @include ('admin.authorization.roles.form', ['submitButtonText' => 'Оновити'])
                        {!! Form::close() !!}
                    </div>

             </div>
        </div>


@endsection
