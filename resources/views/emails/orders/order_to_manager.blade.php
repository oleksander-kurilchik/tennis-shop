@component('mail::message')
    <table align="center" cellpadding="0" cellspacing="0" width="800" style="border-collapse: collapse;min-width:500px">

        <tr>
            <td style="padding: 40px 30px 40px 30px">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td colspan="3" style="padding-top: 10px;padding-bottom: 20px">
                            <p style="font-size: 16px; ">
                                <b>
{{--                                    {{$order->first_name}} {{$order->last_name}}, благодарим за ваш заказ!--}}
                                </b>
                            </p>
                            <p style="font-size: 14px; ">
                                Отримано нове замовлення №{{$order->id}}.
                            </p>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-top: 15px"><h4 style="font-size: 16px; font-weight: bold; ">
                                Товари</h4></td>
                    </tr>
                    @foreach($order->products as $product)
                        <tr>
                            <td colspan="3"
                                style="padding:5px 0; border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;">
                                <table style="box-sizing: border-box; width: 100%">
                                    <tbody>
                                    <tr>
                                        <td rowspan="4" width="120" style="">
                                            @if($product->product->logo)
                                                <a href="{{route('frontend.products.show',['slug'=>$product->product->slug])}}" style="width: 100px;display: inline-block">
                                                    <img src="{{$product->product->logo->small_path}}" alt=""  style="max-width: 100%" >
                                                </a>
                                            @endif
                                        </td>
                                        <td width="322">
                                            <a href="{{route('frontend.products.show',['slug'=>$product->product->slug])}}" style="color: #798999; text-decoration: none">
                                                {{$product->product_name}}
                                            </a>
                                            {{$product->description}}

                                        </td>
                                        <td width="100"><div> Розмірна сітка:</div>
                                            <div> {{$product->dimensional_grid}}</div>
                                             </td>
                                        <td width="80">Артикул: {{$product->vendor_code}} </td>
                                    </tr>
                                    <tr>

                                        <td colspan="2">
                                            <table width="100%">
                                                <tbody>
                                                <tr>
                                                    <td width="33%">Кст.: {{$product->quantity}} шт.</td>
{{--                                                    <td width="33%">--}}
{{--                                                        Цена: {{$product->price->price}}{{$order->currency->short_name}}--}}
{{--                                                        .--}}
{{--                                                    </td>--}}
{{--                                                    <td width="33%">--}}
{{--                                                        Сумма: {{$product->price->total_price}}{{$order->currency->short_name}}--}}
{{--                                                        .--}}
{{--                                                    </td>--}}
                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach



                </table>
            </td>
        </tr>


        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Імя :</b> {{$user->first_name}}

            </td>

        </tr>


        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Прізвище :</b> {{$user->last_name}}

            </td>

        </tr>


        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">По батькові :</b> {{$user->patronymic}}

            </td>

        </tr>

        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Країна :</b> {{$user->country->name}}

            </td>

        </tr>

        @if($user->countries_id == 1)
        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Країна :</b> {{$user->region->name}}

            </td>

        </tr>
        @endif


        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Місто :</b> {{$user->city}}

            </td>

        </tr>




        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Адреса :</b> {{$user->address}}

            </td>

        </tr>






        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Телефон :</b> {{$order->phone}}

            </td>

        </tr>

        @if ($order->email)
            <tr>
                <td style="padding: 5px 30px">
                    <b style="width: 120px;
                   display: inline-block;
                   float: none;">Email:</b> {{$order->email}}

                </td>

            </tr>
        @endif
        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Дата:</b> {{$order->date_order}}

            </td>

        </tr>

        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">Количество:</b> {{$order->total_count}} шт.

            </td>

        </tr>

        @if($order->user_message)
            <tr>
                <td style="padding: 5px 30px">
                    <p><b>Примечание</b></p>
                    <p>{{$order->user_message}}</p>
                </td>

            </tr>
        @endif

    </table>
@endcomponent
