@extends('layouts.backend')
@section("sub_title") - Доставка для замовлення @endsection
@section('content')
    <script>
        window._formErrors =  {!! $errors->toJson() !!}
            window._formOld =  @json(old());
    </script>
    <div class="card">
        <div class="card-header">Доставка для замовлення - "{{$order->name}}" #{{ $order->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.orders.edit",['id'=>$order->id]) }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до замовлення
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::model($delivery, [
                'method' => 'PATCH',
                'url' => route('admin.orders_delivery.update',['orders_id'=>$delivery->orders_id]),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true,
                'id'=>'orders_delivery_form'
            ]) !!}
            @include ('admin.orders_delivery.form', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
