@extends('layouts.backend')

@section("sub_title") -  Групи товарів   @endsection

@section('content')
    <div class="card">
        <div class="card-header">Створити групу товарів</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.products_variations.groups.index',['products_id'=>$product->id])}}"
                   title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")

            {!! Form::open(['url' => route("admin.products_variations.groups.store",['products_id'=>$product->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.products_variations.groups.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
