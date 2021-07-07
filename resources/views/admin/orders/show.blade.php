@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Замовлення  @endsection

@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="card">
        <div class="card-header">Замовлення {{ $order->id }}</div>
        <div class="card-body">

            <a href="{{ route("admin.orders.index")}}" title="Назад">
                <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                </button>
            </a>
{{--            <a href="{{route("admin.orders.edit",["id"=>$order->id]) }}" title="Редагувати">--}}
{{--                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
{{--                </button>--}}
{{--            </a>--}}
            <a href="{{route("admin.orders.show-email",["id"=>$order->id]) }}" title="">
                <button class="btn btn-primary btn-xs"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                </button>
            </a>


{{--            {!! Form::open([--}}
{{--                'method'=>'DELETE',--}}
{{--                'url' => route("admin.orders.delete",["id"=>$order->id]),--}}
{{--                'style' => 'display:inline'--}}
{{--            ]) !!}--}}
{{--            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(--}}
{{--                    'type' => 'submit',--}}
{{--                    'class' => 'btn btn-danger btn-xs',--}}
{{--                    'title' => 'Видалити товар',--}}
{{--                    'onclick'=>'return confirm("Підтвердити видалення?")'--}}
{{--            ))!!}--}}
{{--            {!! Form::close() !!}--}}
            <br/>
            <br/>

            <div class="table-responsive">
                @include("admin.orders.parts.order_description",["order"=>$order])
            </div>

            <div class="order-products">
                <h2>Товари</h2>
                <div class="table-responsive">
                    <table class="table table-striped" style="font-size: 14px">
                        <thead>
                        <tr>
                            <th></th>
                            <th style="max-width:200px">Продукт</th>
                            <th>Артикул</th>
                            <th>Кількість</th>
                            @foreach($order->prices as $oderPrice)
                                <th>Ціна</th>
                                <th>Загальна ціна</th>
                            @endforeach

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            @include("admin.orders.parts.show_product_item",["product"=>$product])
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



{{--            <div class="order-products">--}}
{{--                <h2>Послуги</h2>--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-striped" style="font-size: 14px">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}

{{--                            <th style="max-width:200px">Назва</th>--}}
{{--                            <th>Заголовок</th>--}}
{{--                            <th>Статус</th>--}}
{{--                            <th>ціна</th>--}}
{{--                            @foreach($order->prices as $oderPrice)--}}
{{--                                <th>Ціна</th>--}}
{{--                             @endforeach--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($order->services as $service)--}}
{{--                            @include('admin.orders.parts.show_service_item',['service'=>$service])--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
@endsection
