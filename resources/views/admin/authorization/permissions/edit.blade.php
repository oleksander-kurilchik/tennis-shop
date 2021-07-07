@extends('layouts.backend')


@section("sub_title") - Права (permissions)   @endsection


@section('content')

        <div class=" card">
            <div class="card-header">Редагувати дозвіл #{{ $permission->id }}</div>
            <div class="card-body">
                <div class="header-admin-button py-2">
                <a href="{{ route("admin.permissions.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>

                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li class="nav-item " ><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна інформація</a></li>
                </ul>
                <div class="tab-content">
                    <div id="main_inf" class="tab-pane fade show active pt-4">
                        {!! Form::model($permission, [
                            'method' => 'PATCH',
                            'url' => route("admin.permissions.update",["id"=>$permission->id]),
                            'class' => 'form-horizontal  form-admin',
                            'files' => true
                        ]) !!}
                        @include ('admin.authorization.permissions.form', ['submitButtonText' => 'Оновити'])
                        {!! Form::close() !!}
                    </div>

             </div>
        </div>


@endsection
