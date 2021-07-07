<div class="p-product__description">


    <div class="b-card-list p-product__card-list">
        <div class="b-card-list__groups-list">
            <div class="b-card-list__group">
                <h1 class="p-product__title">
                    {{$product->trans->title}}
                </h1>
                <div class="p-product__status-block">
                    @if($product->available)
                        <span class="p-product__available">
                                <svg class="p-product__available-icon" width="20" height="18" viewBox="0 0 17 18"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.2381 8.67237V9.38094C15.2362 12.7552 13.0151 15.7262 9.77936 16.683C6.54359 17.6397 3.06396 16.3541 1.22744 13.5235C-0.609087 10.6928 -0.365013 6.99133 1.8273 4.42633C4.01961 1.86132 7.63792 1.04382 10.72 2.41713"
                                    stroke="#14C04A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.9997 2.5238L7.61872 10.9048L5.33301 8.61904" stroke="#14C04A"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            @lang('product.available')
                        </span>
                    @else
                    <span class="p-product__not-available ">
                            <svg class="p-product__not-available-icon" width="20" height="18" viewBox="0 0 20 18"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="9.67066" cy="9" rx="8.67066" ry="8" stroke="#FF4B6C" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.2717 6.60001L7.06934 11.4" stroke="#FF4B6C" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.06934 6.60001L12.2717 11.4" stroke="#FF4B6C" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                         @lang('product.not_available')
                        </span>
                    @endif

                    <span class="p-product__qty-reviews">
                            <svg class="p-product__qty-reviews-icon" width="19" height="18" viewBox="0 0 17 18"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16 8.55555C16.0031 9.72877 15.7289 10.8861 15.2 11.9333C13.9209 14.4927 11.3057 16.11 8.44444 16.1111C7.27123 16.1142 6.11388 15.8401 5.06667 15.3111L0 17L1.68889 11.9333C1.15994 10.8861 0.88583 9.72877 0.888889 8.55555C0.889996 5.6943 2.50726 3.07914 5.06667 1.79999C6.11388 1.27104 7.27123 0.996936 8.44444 0.999995H8.88889C12.7252 1.21164 15.7884 4.27483 16 8.11111V8.55555V8.55555Z"
                                      stroke="#2962FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                             @lang('product.number_reviews')<span class="js-p-product__qty-reviews-count">0</span>
                        </span>

                    <span class="p-product__vendor-code">
                            <span class="p-product__vendor-code-title">
                                @lang('product.vendor_code')

                            </span>
                            <span class="p-product__vendor-code-value">
                                {{$product->vendor_code}}
                            </span>
                        </span>




                    @include('frontend.products.parts.show.variants_list')
                </div>
            </div>


            <div class="b-card-list__group">
                <div class="p-product__price-block">
                    <div class="p-product__price {{$product->front->old_price!=0?'p-product__price_discount':''}} ">
                        {{ $product->front->price}} грн
                    </div>
                    @if($product->front->old_price)
                    <div class="p-product__old-price">
                        {{$product->front->old_price}} грн
                    </div>
                    @endif
                </div>
                @if($product->available || Auth::guard('frontend')->check() )

                <div class="p-product__buttons-block js-add-product-to-cart-container">
                    @include('frontend.products.parts.show.product_buttons')



                </div>
                @endif
                @include('frontend.products.parts.show.social_block')


            </div>
        </div>


    </div>


</div>
