<div class="b-product-item">
    <div class="b-product-item__logo">
        <a href="{{$product->front->url}}" class="d-block">
            <picture class="b-product-item__logo-picture">
                @if($product->logo)

                    <source type="image/webp" srcset="{{$product->logo->path->path_1x_webp}}" alt=""
                            class="b-product-item__logo-img img-fluid">
                    {{--            <source  type="image/png"  srcset="/images/product_item/logo.png"   alt="" class="b-product-item__logo-img img-fluid">--}}
                    <img src="{{$product->logo->path->path_1x}}" alt="" class="b-product-item__logo-img img-fluid">
                @endif
            </picture>
        </a>
        <div class="b-product-item__label-list">
            @if($product->top)
                <div class="b-product-item__label-item-top">
                    @lang('product_item.top')
                </div>
            @endif
            @if($product->new)
                <div class=" b-product-item__label-item-new">
                    @lang('product_item.new')
                </div>
            @endif
            @if($product->front->discountPercent)
                <div class="b-product-item__label-item-discount-percent">
                    -{{$product->front->discountPercent}}%
                </div>
            @endif

        </div>
        @if(Auth::guard('frontend')->check())
        <span class="b-product-item__label-favorite-block {{WishlistHandler::isExists($product->id)?"b-product-item__label-favorite-block_active":null}}">
                 <a href="{{route('frontend.account.profile.wishlist.index')}}" class="b-product-item__label-favorite-active">
                <svg class="b-product-item__label-favorite-icon" width="28" height="25" viewBox="0 0 28 25" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M24.4472 3.90275C23.2282 2.6831 21.5744 1.99786 19.85 1.99786C18.1255 1.99786 16.4718 2.6831 15.2527 3.90275L14 5.15548L12.7472 3.90275C10.2082 1.36374 6.09169 1.36375 3.55269 3.90275C1.01369 6.44175 1.01369 10.5583 3.55269 13.0973L4.80542 14.35L14 23.5446L23.1945 14.35L24.4472 13.0973C25.6669 11.8782 26.3521 10.2245 26.3521 8.50002C26.3521 6.77559 25.6669 5.12182 24.4472 3.90275Z"
                      stroke="#BBC0D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

                <span class="b-product-item__label-favorite js-add-product-to-wishlist " data-id="{{$product->id}}">
                <svg class="b-product-item__label-favorite-icon" width="28" height="25" viewBox="0 0 28 25" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M24.4472 3.90275C23.2282 2.6831 21.5744 1.99786 19.85 1.99786C18.1255 1.99786 16.4718 2.6831 15.2527 3.90275L14 5.15548L12.7472 3.90275C10.2082 1.36374 6.09169 1.36375 3.55269 3.90275C1.01369 6.44175 1.01369 10.5583 3.55269 13.0973L4.80542 14.35L14 23.5446L23.1945 14.35L24.4472 13.0973C25.6669 11.8782 26.3521 10.2245 26.3521 8.50002C26.3521 6.77559 25.6669 5.12182 24.4472 3.90275Z"
                      stroke="#BBC0D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>




        </span>
        @endif


    </div>
    <div class="b-product-item__title-wrap">
        <a href="{{$product->front->url}}" class="b-product-item__title">
            {!! $product->trans->title !!}
        </a>
    </div>
    <div class="b-product-item__price-block">

        <div class="b-product-item__price b-product-item__price_discount">
            {{$product->front->price}} грн
        </div>
        @if($product->front->old_price)
            <div class="b-product-item__old-price">
                {{$product->front->old_price}} грн
            </div>
        @endif

    </div>


</div>
