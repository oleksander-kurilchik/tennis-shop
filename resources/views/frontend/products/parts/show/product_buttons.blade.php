
<div class="p-product__buttons-list ">

    @if($product->available)
    <div class="p-product__buttons-item p-product__buttons-item_buy">

        <button class="button-default p-product__button-buy js-add-product-to-cart" data-id="{{$product->id}}">
            <svg class="p-product__button-buy-icon" width="26" height="26" viewBox="0 0 26 26" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <circle cx="8.63592" cy="22.8182" r="2.18182" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="21.7277" cy="22.8182" r="2.18182" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"/>
                <path
                    d="M6.09455 6.45455H25L23.1673 15.6073C22.9614 16.6439 22.0421 17.3839 20.9855 17.3636H9.45455C8.35216 17.373 7.416 16.5585 7.27273 15.4655L5.61455 2.89818C5.47232 1.81338 4.54863 1.00166 3.45455 1H1"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            @lang('product.add_to_cart')
        </button>
    </div>
    @endif
    @if(Auth::guard('frontend')->check())
        <div class="p-product__buttons-item p-product__button-item-favorite {{WishlistHandler::isExists($product->id)?"p-product__button-item-favorite_active":null}} ">
            <button class="button-default-primary p-product__button-favorite js-add-product-wishlist-from-product " data-id="{{$product->id}}">
                <svg class="p-product__button-favorite-icon" width="24" height="22" viewBox="0 0 24 22"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M20.8401 3.60999C19.8086 2.57799 18.4093 1.99817 16.9501 1.99817C15.491 1.99817 14.0916 2.57799 13.0601 3.60999L12.0001 4.66999L10.9401 3.60999C8.79173 1.46161 5.30851 1.46161 3.16012 3.60999C1.01173 5.75838 1.01173 9.24161 3.16012 11.39L4.22012 12.45L12.0001 20.23L19.7801 12.45L20.8401 11.39C21.8721 10.3585 22.4519 8.95913 22.4519 7.49999C22.4519 6.04086 21.8721 4.64152 20.8401 3.60999Z"
                          stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="p-product__button-favorite-text">
                             @lang('product.add_to_favorite')
                        </span>
            </button>
            <a href="{{route('frontend.account.profile.wishlist.index')}}" class="button-default-primary p-product__button-favorite  p-product__button-in-favorite" >
                <svg class="p-product__button-favorite-icon" width="24" height="22" viewBox="0 0 24 22"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M20.8401 3.60999C19.8086 2.57799 18.4093 1.99817 16.9501 1.99817C15.491 1.99817 14.0916 2.57799 13.0601 3.60999L12.0001 4.66999L10.9401 3.60999C8.79173 1.46161 5.30851 1.46161 3.16012 3.60999C1.01173 5.75838 1.01173 9.24161 3.16012 11.39L4.22012 12.45L12.0001 20.23L19.7801 12.45L20.8401 11.39C21.8721 10.3585 22.4519 8.95913 22.4519 7.49999C22.4519 6.04086 21.8721 4.64152 20.8401 3.60999Z"
                          stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="p-product__button-favorite-text">
                             @lang('product.in_favorite')
                </span>
            </a>
        </div>
    @endif


</div>


