@extends('layouts.backend')

@section("sub_title") - Товари  @endsection

@section('content')
         <div class="card">
            <div class="card-header">Створити товар</div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.products.index")}}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            назад
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")

                {!! Form::open(['url' => route("admin.products.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
                @include ('admin.products.form')
                {!! Form::close() !!}
            </div>
        </div>
 @endsection
