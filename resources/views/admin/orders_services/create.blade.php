@extends('layouts.backend')

@section("sub_title") -Послуга для замовлення  @endsection
@section('content')
        <div class="card">
            <div class="card-header">Додати  послугу замовлення #{{$order->id}} : {{$order->name}} </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route('admin.orders.edit',['id'=> $order->id]) }}" title="Назад">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                        </button>
                    </a>
                </div>
                @include('admin.global.message_block')
                {!! Form::open(['url' => route('admin.orders_services.store',['orders_id'=>$order->id]), 'class' => 'form-horizontal form-admin  pt-4 pb-4', 'files' => true]) !!}
                @include ('admin.orders_services.form')
                {!! Form::close() !!}

            </div>
        </div>
@endsection
