@extends('layouts.backend')

@section('sub_title') -  Товари варіантів   @endsection

@section('content')
    <div class="card">
        <div class="card-header">Додати  товар  групи - {{$group->name}} </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.products_variations.items.index',['group_id'=>$group->id])}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        назад
                    </button>
                </a>
            </div>
            @include('admin.global.message_block')
            {!! Form::open(['url' => route('admin.products_variations.items.store',['group_id'=>$group->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.products_variations.items.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
