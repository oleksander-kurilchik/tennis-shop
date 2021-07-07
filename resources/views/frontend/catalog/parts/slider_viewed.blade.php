@if($products->isNotEmpty())
<div class="b-slider-container ">
    <div class="product-last-viewed-slider__container container">

        <div class="b-slider">


            <div class="b-slider__title-and-controls">
                <div class="b-slider__title">
                    <svg  class="b-slider__title-icon" width="34" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12.9091C0 12.9091 5.45455 2 15 2C24.5455 2 30 12.9091 30 12.9091C30 12.9091 24.5455 23.8182 15 23.8182C5.45455 23.8182 0 12.9091 0 12.9091Z" stroke="#2962FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="15.0001" cy="12.909" r="4.09091" stroke="#2962FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    @lang('sliders.last_viewed')
                </div>
                <div class="b-slider__controls">
                    <button class="button-default-circle  b-slider__prev-btn   js-b-slider__prev-btn">
                        <svg class="b-slider__prev-btn-img" width="18" height="14" viewBox="0 0 18 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 7H1" stroke="#1D2E72" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M7 13L1 7L7 1" stroke="#1D2E72" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                    </button>
                    <div class="b-slider__counter-text  js-b-slider__counter-text">
                        <div class="b-slider__controls-text-1"></div>
                        <div class="b-slider__controls-text-2"></div>
                        <div class="b-slider__controls-text-3"></div>

                    </div>

                    <button class="button-default-circle b-slider__next-btn js-b-slider__next-btn">
                        <svg class=" b-slider__next-btn-img" width="18" height="14" viewBox="0 0 18 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7H17" stroke="#1D2E72" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M11 1L17 7L11 13" stroke="#1D2E72" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </button>


                </div>

            </div>


            <div class="b-slider__product-list">
                <div class="swiper-container  b-slider__swiper-container   js-b-slider-last-viewed__swiper-container ">
                    <div class="swiper-wrapper   b-slider__swiper-wrapper">
                        @foreach($products as $product)
                            <div class="swiper-slide b-slider__product-item">
                                @include('frontend.global.parts.product_item',['product'=>$product])
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>

        </div>


    </div>
</div>
@endif
