@component('mail::message')
    <table align="center" cellpadding="0" cellspacing="0" width="800" style="border-collapse: collapse;min-width:500px">

        <tr>
            <td style="padding: 40px 30px 40px 30px">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td colspan="3" style="padding-top: 10px;padding-bottom: 20px">
                            <p style="font-size: 16px; ">
                                <b>
                                     @lang('emails.orders.title',['first_name'=>$order->first_name,'last_name'=>$order->last_name])
                                </b>
                            </p>
                            <p style="font-size: 14px; ">
                                @lang('emails.orders.sub_title',['id'=>$order->id]) .
                            </p>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-top: 15px"><h4 style="font-size: 16px; font-weight: bold; ">
                                @lang('emails.orders.products')</h4></td>
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
                                                <a href="{{$product->product->front->url}}" style="width: 100px;display: inline-block">
                                                    <img src="{{$product->product->logo->path->path_1x}}" alt=""  style="max-width: 100%" >
                                                </a>
                                            @endif
                                        </td>
                                        <td width="322">
                                            <a href="{{route('frontend.products.show',['slug'=>$product->product->slug])}}" style="color: #798999; text-decoration: none">
                                                {{$product->product_name}}
                                            </a>
                                            {{$product->description}}

                                        </td>

                                        <td width="80">@lang('emails.orders.vendor_code'): {{$product->vendor_code}} </td>
                                    </tr>
                                    <tr>

                                        <td colspan="2">
                                            <table width="100%">
                                                <tbody>
                                                <tr>
                                                    <td width="33%">@lang('emails.orders.qty').: {{$product->quantity}} @lang('emails.orders.qty_amount').</td>
                                                    <td width="33%">
                                                        @lang('emails.orders.price'): {{$product->price->price}} {{$order->currency->front->short_name}}.
                                                    </td>
                                                    <td width="33%">
                                                        @lang('emails.orders.sum'): {{$product->price->total_price}} {{$order->currency->front->short_name}}.
                                                    </td>
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
                   float: none;">@lang('emails.orders.phone') :</b> {{$order->phone}}

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
                   float: none;">@lang('emails.orders.date'):</b> {{$order->date_order}}

            </td>

        </tr>
        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">@lang('emails.orders.total_price'):</b> {{$order->price->price}} {{$order->currency->front->short_name}}.
            </td>

        </tr>
        <tr>
            <td style="padding: 5px 30px">
                <b style="width: 120px;
                   display: inline-block;
                   float: none;">@lang('emails.orders.quantity'):</b> {{$order->total_count}} @lang('emails.orders.qty_amount').

            </td>

        </tr>

        @if($order->user_message)
            <tr>
                <td style="padding: 5px 30px">
                    <p><b>@lang('emails.orders.comment')</b></p>
                    <p>{{$order->user_message}}</p>
                </td>

            </tr>
        @endif

    </table>
@endcomponent
