@extends('layouts.backend')
@section('sub_title') - Послуга для заказу  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Редарувати послугу замовлення #{{$order->id}} : {{$order->name}}:  -- "{{$orderService->name}}" #{{ $orderService->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.orders.edit',['id'=>$order->id]) }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до замовлення
                    </button>
                </a>
            </div>
            @include('admin.global.message_block')
            {!! Form::model($orderService, [
                'method' => 'PATCH',
                'url' => route('admin.orders_services.update',['id'=>$orderService->id]),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true
            ]) !!}
            @include ('admin.orders_services.form', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
