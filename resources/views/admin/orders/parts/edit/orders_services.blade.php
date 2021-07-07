<div class="order-services">
    <div class="pb-2 pt-3"><h2 class="d-inline pr-2">Послуги</h2>
        @if($order->canEdit())   <a
                href="{{route('admin.orders_services.create',['orders_id'=>$order->id])}}"
                class="btn btn-primary btn-sm">Додати послугу</a>@endif

    </div>
    <div class="table-responsive">
        <table class="table table-striped" style="font-size: 14px">
            <thead>
            <tr>

                <th style="max-width:200px">Назва</th>
                <th>Заголовок</th>
                <th>Статус</th>
                <th>ціна</th>
                @foreach($order->prices as $oderPrice)
                    <th>Ціна</th>
                @endforeach

                @if($order->canEdit())
                    <th>Дії</th> @endif

            </tr>
            </thead>
            <tbody>
            @foreach($order->services as $service)
                @include('admin.orders.parts.show_service_item_edit',['service'=>$service])
            @endforeach
            </tbody>
        </table>
    </div>
</div>