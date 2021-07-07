@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Значення фільтра "{{$filter->name}}"  @endsection

@section('content')
         <div class="card">
            <div class="card-header">Створити значення для фільтра "{{$filter->name}}" </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.filters_values.index",["filters_id"=>$filter->id])}}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            назад
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")

                {!! Form::open(['url' => route("admin.filters_values.store",["filters_id"=>$filter->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
                @include ('admin.filters_values.form')
                {!! Form::close() !!}
            </div>
        </div>
 @endsection
