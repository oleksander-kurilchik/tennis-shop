@extends('layouts.backend')

@section("sub_title") -  Групи атрибутів   @endsection
@section('content')
    <div  id="product-content">
        <div class="card">
            <div class="card-header">Редагувати групу атрибутів  #{{ $group->id }} - {{$group->name}} </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route('admin.products_attributes.groups.index') }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                        </button>
                    </a>

                    <a href="{{ route('admin.products_attributes.attributes.index',['group_id'=>$group->id]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Атрибути
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                {!! Form::model($group, ['method' => 'PATCH',
                   'url' => route('admin.products_attributes.groups.update',['id'=>$group->id]),
                   'class' => 'form-horizontal form-admin',
                   'files' => true]) !!}
                        @include ('admin.products_attributes.groups.form', ['submitButtonText' => 'Зберегти'])
                {!! Form::close() !!}

        </div>
    </div>

@endsection
