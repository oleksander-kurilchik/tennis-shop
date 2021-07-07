@extends('layouts.backend')

@section("sub_title") -  Групи товарів   @endsection
@section('content')
    <div id="product-content">
        <div class="card">
            <div class="card-header">Редагувати групу тоарів #{{ $group->id }} - {{$group->name}} </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route('admin.products_variations.groups.index',['products_id'=>$product->id]) }}"
                       title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                        </button>
                    </a>

                    <a href="{{ route('admin.products_variations.items.index',['group_id'=>$group->id]) }}"
                       title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Товари
                            групи
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                {!! Form::model($group, ['method' => 'PATCH',
                   'url' => route('admin.products_variations.groups.update',['id'=>$group->id]),
                   'class' => 'form-horizontal form-admin',
                   'files' => true]) !!}
                @include ('admin.products_variations.groups.form', ['submitButtonText' => 'Зберегти'])
                {!! Form::close() !!}

            </div>
        </div>

@endsection
