@extends('layouts.backend')


@section('content')

    <div class="card">
        <div class="card-header">Дозволи ролі #{{$role->id}} - {{$role->name}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.roles.edit",["id"=>$role->id]) }}" class="btn btn-warning btn-sm"
                   title="Назад до продукту">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до ролі
                </a>

            </div>
            @include("admin.global.message_block")
            {!! Form::open(['method' => 'POST', 'url' =>  route("admin.roles_permissions.update",["roles_id"=>$role->id]) , 'class' => 'navbar-form'])  !!}
            <div class="card  mt-4">
                <div class="card-header">Права</div>
                <div class="card-body">
                    <div class="row">
                    @foreach($permissions as $item)
                        <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{$item->id}}"
                                       @if(in_array($item->id,$items_values_arr)) checked @endif autocomplete="off" > {{$item->name}}
                            </label>
                        </div></div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-4 pb-5">
            {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection
