@extends('layouts.backend')



@section('content')

    <div class="card">
        <div class="card-header">Ролі користувача #{{$user->id}} - {{$user->name}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_users.edit",["id"=>$user->id]) }}" class="btn btn-warning btn-sm"
                   title="Назад до продукту">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до користувача
                </a>

            </div>
            @include("admin.global.message_block")
            {!! Form::open(['method' => 'POST', 'url' =>  route("admin.users_roles.update",["users_id"=>$user->id]) , 'class' => 'navbar-form'])  !!}
            <div class="card  mt-4">
                <div class="card-header">Права</div>
                <div class="card-body">
                    @foreach($roles as $item)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="roles[]" value="{{$item->id}}"
                                       @if(in_array($item->id,$items_values_arr)) checked @endif autocomplete="off" > {{$item->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-center pt-4 pb-5">
            {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection
