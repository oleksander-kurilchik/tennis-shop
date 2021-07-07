@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
<?php
use Carbon\Carbon;
?>
@section("sub_title") - Замовлення  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Редагувати замовлення #{{ $order->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.orders.index") }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>

{{--                @if($order->canEdit())--}}
{{--                    {!! Form::open([--}}
{{--                                        'method'=>'POST',--}}
{{--                                        'url' => route("admin.orders.rebuild-all-price",["id"=>$order->id]),--}}
{{--                                        'style' => 'display:inline'--}}
{{--                                    ]) !!}--}}
{{--                    {!! Form::button('<i class="fa  fa-money" aria-hidden="true"></i> Перерахувати замовлення ', array(--}}
{{--                            'type' => 'submit',--}}
{{--                            'class' => 'btn btn-danger btn-sm',--}}
{{--                            'title' => 'Перерахувати замовлення',--}}
{{--                            'onclick'=>'return confirm("Підтвердити перерахування?")'--}}
{{--                    )) !!}--}}
{{--                    {!! Form::close() !!}--}}
{{--                @endif--}}

{{--                {!! Form::open([--}}
{{--                                   'method'=>'POST',--}}
{{--                                   'url' => route("admin.orders.resend_order_email",["id"=>$order->id]),--}}
{{--                                   'style' => 'display:inline'--}}
{{--                               ]) !!}--}}
{{--                {!! Form::button('<i class="fa  fa-envelope" aria-hidden="true"></i> Знову відправити листа ', array(--}}
{{--                        'type' => 'submit',--}}
{{--                        'class' => 'btn btn-danger btn-sm',--}}
{{--                        'title' => 'Знову відправити листа',--}}
{{--                        'onclick'=>'return confirm("Знову відправити листа?")'--}}
{{--                )) !!}--}}
{{--                {!! Form::close() !!}--}}
{{--                @if($order->canEdit())--}}
{{--                    <a href="{{route('admin.orders_delivery.edit',['orders_id'=>$order->id])}}"--}}
{{--                       class="btn btn-primary btn-sm"> <i class="fa fa-car" aria-hidden="true"></i>--}}
{{--                        Редагувати доставку</a>--}}
{{--                @endif--}}
            </div>
            <div class="change-order-status well">
                <div class="form-group">
                    {!! Form::label('order_status', 'Статус замовлення', ['class' => 'col-md-12 control-label']) !!}
                    <div class="col-xs-12"></div>
                    {!! Form::open([
                                           'method'=>'POST',
                                           'url' => route("admin.orders.change-order-status",["id"=>$order->id]),
                                           'class' => 'form-horizontal',
                                       ]) !!}
                    <select class="form-control" name="status">
                        @foreach($orderStatuses as $key => $status )
                            <option value="{{$key}}" {{$order->status == $key?'selected':''}} > {{$status}} </option>
                        @endforeach
                    </select>
                    <br>

                    {!! Form::button('<i class="fa  fa-money" aria-hidden="true"></i> Змінити статус замовлення' , array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Змінити статус замовлення',
                            'onclick'=>'return confirm("Підтвердити зміну статусу?")'
                    )) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            @include("admin.global.message_block")
            <div>
                <hr class="mt-4">
                <div class="table-responsive">
                    @include("admin.orders.parts.order_description",["order"=>$order])
                </div>

                @include('admin.orders.parts.edit.orders_products')
{{--                @include('admin.orders.parts.edit.orders_services')--}}
            </div>

        </div>
    </div>

@endsection

