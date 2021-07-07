
<div class="b-slider">


    <div class="b-slider__title-and-controls">
        <div class="b-slider__title">

            <svg class="b-slider__title-icon" width="30" height="33" viewBox="0 0 29 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1L0 19H13.5L12 31L27 13H13.5L15 1V1Z" stroke="#FF4B6C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            @lang('sliders.sale')
        </div>
        <div class="b-slider__controls">
            <button class="button-default-circle  b-slider__prev-btn   js-b-slider__prev-btn">
                <svg class="b-slider__prev-btn-img" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 7H1" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 13L1 7L7 1" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </button>
            <div class="b-slider__counter-text  js-b-slider__counter-text">
                <div class="b-slider__controls-text-1"> </div>
                <div class="b-slider__controls-text-2"> </div>
                <div class="b-slider__controls-text-3"> </div>

            </div>

            <button class="button-default-circle b-slider__next-btn js-b-slider__next-btn">
                <svg class=" b-slider__next-btn-img" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 7H17" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11 1L17 7L11 13" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>


        </div>

    </div>


    <div class="b-slider__product-list">
        <div class="swiper-container  b-slider__swiper-container   js-b-mainpage-profitable ">
            <div class="swiper-wrapper   b-slider__swiper-wrapper">
                   @foreach($products as $product)
                <div class="swiper-slide b-slider__product-item">
                    @include('frontend.global.parts.product_item',['product'=>$product])
                </div>
                @endforeach
            </div>
        </div>



    </div>
    <div class="b-slider__block-get-more">

        <a href="{{route('frontend.products.sale')}}" class="b-slider__get-more-link button-default-primary"> @lang('sliders.show_all')
            <svg  class="ml-2"  width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7H17" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 1L17 7L11 13" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </a>

    </div>






</div>
