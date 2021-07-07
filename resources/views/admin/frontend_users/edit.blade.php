@extends('layouts.backend')

@section("sub_title") - Кліенти  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Редагувати кліента #{{ $user->id }} - "{{$user->email}}"</div>
        <div class="card-body">
            <div class="header-admin-button pt-2 pb-4">
                <a href="{{ route("admin.frontend_users.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>


            </div>
            @include("admin.global.message_block")
            <ul class="nav nav-tabs">
                <li class="nav-item "><a class="nav-link active" role="tab" data-toggle="tab" href="#main_inf"
                                         aria-controls="main_inf" aria-selected="true"
                    >Головна інформація</a></li>

            </ul>

            <div class="tab-content">
                <div id="main_inf" role="tabpanel" class="tab-pane fade show active pt-4">
                            {!! Form::model($user, [
                       'method' => 'PATCH',
                       'url' => route("admin.frontend_users.update",["id"=>$user->id]),
                       'class' => 'form-horizontal form-admin',
                       'files' => true
                             ]) !!}

                    @include ('admin.frontend_users.form', ['submitButtonText' => 'Оновити'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>






@endsection
