@php



@endphp
<div class="b-profile-order">
    <div class="b-profile-order__header">
        <div class="b-profile-order__number b-profile-order__header-item">
            №{{$order->id}}
        </div>
        <div class="b-profile-order__date b-profile-order__header-item">
            {{$order->front->date}}
        </div>
        <div class="b-profile-order__status b-profile-order__header-item">




            <svg class="b-profile-order__status-icon" width="19" height="18" viewBox="0 0 17 18" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="9" r="8" stroke="#2962FF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/>
                <path d="M8 4.20001V9.00001L10.4 11.4" stroke="#2962FF" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>

            &nbsp;  {{$order->front->status}}

        </div>
        <div class="b-profile-order__price b-profile-order__header-item">
            {{$order->front->price}} грн
        </div>
        <div class="b-profile-order__show-hide-block b-profile-order__header-item ml-lg-auto">
            <a class="b-profile-order__show-hide-link" data-toggle="collapse" href="#collapse_order_{{$order->id}}"
               role="button" aria-expanded="false" aria-controls="collapse_order_{{$order->id}}">
                <span class="b-profile-order__hide">@lang('profile.order_item.show')
                </span>
                <span class="b-profile-order__show">@lang('profile.order_item.hide')
                </span>

                <svg class="b-profile-order__show-hide-link-img"  width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.75078 5.875C4.91693 6.04167 5.08307 6.04167 5.24922 5.875L9.85981 1.28125C10.0467 1.09375 10.0467 0.916667 9.85981 0.75L9.26791 0.125C9.081 -0.0416667 8.90446 -0.0416667 8.73832 0.125L5 3.84375L1.26168 0.125C1.09553 -0.0416667 0.919003 -0.0416667 0.732087 0.125L0.140187 0.75C-0.046729 0.916667 -0.046729 1.09375 0.140187 1.28125L4.75078 5.875Z" fill="#1D2E72"/>
                </svg>


            </a>
        </div>
    </div>

    <div class="b-profile-order__content-wrap collapse" id="collapse_order_{{$order->id}}">
        <div class="b-profile-order__content">
            <div class="b-profile-order__product-list">
                @foreach($order->products as $product)
                    <div class="b-profile-order__product-item">
                        <div class="b-profile-order__product-item-logo">
                            @if($product->front->logo)
                            <img src="{{$product->front->logo}}" alt=""
                                 class="b-profile-order__product-item-logo-img">
                            @endif
                        </div>
                        <div class="b-profile-order__product-item-title-price">
                            <div class="b-profile-order__product-item-title">

                                {{$product->front->title}}
                            </div>
                            <div class="b-profile-order__product-item-price">
                                {{$product->front->price}} грн
                                <span class="b-profile-order__product-item-count">
                                x {{$product->front->quantity}}
                            </span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="b-profile-order__description">

                <div class="b-profile-order__property-item">
                    <div class="b-profile-order__property-item-title">@lang('profile.order_item.payment_method')</div>
                    <div class="b-profile-order__property-item-value">{{$order->front->paymentMethod}} </div>
                </div>

                @if($order->front->delivery)
                <div class="b-profile-order__property-item">
                    <div class="b-profile-order__property-item-title">@lang('profile.order_item.delivery_method')</div>
                    @if ($order->front->deliveryMethod)
                        <div class="b-profile-order__property-item-value">{{$order->front->deliveryMethod}}</div>
                    @endif
                    @if ($order->front->deliveryMethod)
                        <div class="b-profile-order__property-item-value">{{$order->front->deliveryAddress}}</div>
                    @endif
                </div>
                @endif


{{--                <div class="b-profile-order__property-item b-profile-order__property-item_horizontal">--}}
{{--                    <div class="b-profile-order__property-item-title">Сума замовлення:</div>--}}
{{--                    <div class="b-profile-order__property-item-value">1 248 грн</div>--}}
{{--                </div>--}}


{{--                <div class="b-profile-order__property-item b-profile-order__property-item_horizontal">--}}
{{--                    <div class="b-profile-order__property-item-title">Доставка:</div>--}}
{{--                    <div class="b-profile-order__property-item-value">40 грн</div>--}}
{{--                </div>--}}
                <div class="b-profile-order__property-item b-profile-order__property-item_horizontal">
                    <div class="b-profile-order__property-item-title">@lang('profile.order_item.total'):</div>
                    <div class="b-profile-order__property-item-value">{{$order->front->price}} грн</div>
                </div>

            </div>

        </div>
    </div>

</div>
