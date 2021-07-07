<?php

use Carbon\Carbon;

?>
<table class="table table-striped ">
    <tbody>
    <tr>
        <th>ID</th>
        <td>{{ $order->id }}</td>
    </tr>
    <tr>
        <th> Імя</th>
        <td> {{ $order->first_name }} </td>
    </tr>
    <tr>
        <th> Призвище</th>
        <td> {{ $order->last_name }} </td>
    </tr>
    <tr>
        <th> Користувач</th>
        <td>
            @if($order->user )
                {{$order->user->first_name }}  {{ $order->user->last_name }}
            @else
                Незараєстрований користувач
            @endif

        </td>
    </tr>
    <tr>
        <th> Email</th>
        <td> {{ $order->email }} </td>
    </tr>
    <tr>
        <th> Телефон</th>
        <td> {{ $order->phone }} </td>
    </tr>
    @if($order->not_call_me)
    <tr>
        <th>  Не телефонувати для підтвердження  </th>
        <td>  </td>
    </tr>
    @endif

    <tr>
        <th> Доставка</th>
        <td> {{ $order->delivery->deliveryTypeText }} </td>
    </tr>

    <tr>
        <th> Місто</th>
        <td> {{ $order->delivery->city_name }} </td>
    </tr>
    <tr>
        <th> Адреса</th>
        <td> {{ $order->delivery->warehouse_name }} </td>
    </tr>
    @if ($order->manager)
        <tr>
            <th> Сформовано менеджером</th>
            <td>  {{$order->manager}}</td>
        </tr>
    @endif
    <th> Дата замовлення</th>
    <td> {{ Carbon::parse($order->date_order)->formatLocalized('%d.%m.%Y  %H:%M:%S')}} </td>
    </tr>
    </tr>
    <th> Статус замовлення</th>
    <td>{{$order->status_text}} </td>
    </tr>

    </tr>
    <th> User Agent</th>
    <td> {{$order->user_agent}} </td>
    </tr>

    </tr>
    <th> IP address</th>
    <td> {{$order->ip}} </td>
    </tr>


    <tr>
        <th> Валюта замовлення</th>
        <td>
            {{$order->currency->name}}
        </td>
    </tr>

    @foreach($order->prices as $orderPrice)
        <tr>
            <th> Загальна сума
                @if($order->currency_id == $orderPrice->currency_id )(валюта замовлення)  @endif
            </th>
            <td>
                {{$orderPrice->price}} {{$orderPrice->currency->code}}
            </td>
        </tr>
    @endforeach


    <tr>
        <th> Кількість</th>
        <td> {{ $order->total_count }} шт.</td>
    </tr>

    @if($order->user_message)
        <tr>
            <th colspan="2"> Повідомлення від користувача</th>
        </tr>
        <tr>
            <td colspan="2"> {{ $order->user_message }}  </td>
        </tr>
    @endif

    @if($order->order_description)
        <tr>
            <th colspan="2"> Опис замовлення</th>
        </tr>
        <tr>
            <td colspan="2"> {{ $order->order_description }}  </td>
        </tr>
    @endif

    </tbody>
</table>
