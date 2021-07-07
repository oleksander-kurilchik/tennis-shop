@extends('layouts.backend')

@section("sub_title") -  Атрибути    @endsection
@section('content')
    <div  id="product-content">
        <div class="card">
            <div class="card-header">Редагувати   атрибут  #{{ $item->id }} - {{$item->name}} --- Групи - {{$group->name}}   </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route('admin.products_variations.items.index',['group_id'=>$group->id ]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                {!! Form::model($item, ['method' => 'PATCH',
                   'url' => route('admin.products_variations.items.update',['id'=>$item->id]),
                   'class' => 'form-horizontal form-admin',
                   'files' => true]) !!}
                        @include ('admin.products_variations.items.form', ['submitButtonText' => 'Зберегти'])
                {!! Form::close() !!}

        </div>
    </div>

@endsection
