<div class="c-product-slider">
    <div class="c-product-slider__content">

        <div class="c-product-slider__thumb" >
            <div class="c-product-slider__thumbs-list-images js-c-product-slider__thumbs-list-images swiper-container">
                <div class="swiper-wrapper">
                    @foreach($product->images as $key => $image)
                        <div class="swiper-slide c-product-slider__thumbs-item-slide" data-index="{{$key+1}}">
                            <div class="c-product-slider__thumbs-item swiper-slide">
                                <picture class="c-product-slider__thumbs-item-picture">
                                    <source  type="image/webp"  srcset="{{$image->path->path_0x_webp}}"   alt="" class="c-product-slider__thumbs-item-image">
                                    <source  type="image/{{$image->path->image_type}}"  srcset="{{$image->path->path_0x }}"   alt="" class="c-product-slider__thumbs-item-image">
                                    <img src="{{$image->path->path_0x }}"   alt="" class="c-product-slider__thumbs-item-image">
                                </picture>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class=" c-product-slider__slider">
            <div class="c-product-slider__list-images js-c-product-slider__list-images swiper-container ">
                <div class="swiper-wrapper">
                    @foreach($product->images as $key => $image)
                        <div class="c-product-slider__item swiper-slide">
                                 <picture class="c-product-slider__item-picture">


                                     <source  type="image/webp"  srcset="{{$image->path->path_2x_webp}} 1x, {{$image->path->path_3x_webp}} 2x"   alt=""  class="c-product-slider__item-image">
                                     <source type="image/{{$image->path->image_type}}"   srcset="{{$image->path->path_2x }} 1x, {{$image->path->path_3x}} 2x"  alt="" class="c-product-slider__item-image">
                                    <img src="{{$image->path->path_2x }}"   alt="" class="c-product-slider__item-image">
                                </picture>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="c-product-slider__pagination">
            <div class="c-product-slider__swiper-pagination js-c-product-slider__swiper-pagination swiper-pagination">
            </div>
        </div>
    </div>
    <div class="c-product-slider__magnific-popup js-c-product-slider__magnific-popup  d-none">
        @foreach($product->images as $key => $image)
            <a href="{{$image->path->path_3x}}" title="{{$product->trans->title}}" class="c-product-slider__magnific-popup-image">
            </a>
        @endforeach
    </div>
</div>

@push('scripts_list')
    @php
    $imageCount = $product->images->count();
    @endphp
    <script>
        $(document).ready(function () {
            var mySwiper;
            var galleryThumbs = new Swiper('.js-c-product-slider__thumbs-list-images', {

                {{--slidesPerView: {{$product->images->count()<=6?$product->images->count():6}},--}}
                // slidesPerView: 5,
                direction: 'vertical',
                // loop: true,
                spaceBetween: 20,
                //  freeMode: true,
                updateOnWindowResize: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                slideToClickedSlide: true,
                slideToClickedSlide:true,
                //   centeredSlides: true,
                //   touchRatio: 0.2,
                breakpoints: {
                    992: {

                        spaceBetween: 10,
                        slidesPerView: {{$imageCount>4?4:$imageCount}}  ,
                    },
                    1200: {
                        height:90,
                        slidesPerView: {{$imageCount>4?4:$imageCount}},
                        spaceBetween: 14
                    },
                    1470: {
                        height:110,
                        slidesPerView: {{$imageCount>5?5:$imageCount}},
                        spaceBetween: 20
                    },
                },
                on: {
                    click: function (swiper, event) {
                        let val = $(event.target).closest('.c-product-slider__thumbs-item-slide').attr('data-index');
                        if (val) {
                            mySwiper.slideTo(parseInt(val));
                        }
                        console.log('click',event,this, val );
                        //mySwiper.slideTo(index, speed, runCallbacks);
                    },
                    // tap:function (event) {
                    //     console.log('tap',event,this);
                    // }
                },
            });
            mySwiper = new Swiper('.js-c-product-slider__list-images', {
                loop: true,
                spaceBetween: 3,
                thumbs: {
                    swiper: galleryThumbs
                },
                pagination: {
                    el: '.js-c-product-slider__swiper-pagination',
                    renderBullet: function (index, className) {
                        return '<span class="c-product-slider__swiper-pagination-item"> <span class="' + className + '"></span></span>';
                    },
                },
                on: {
                    click: function ($event) {
                        console.log('mySwiper click', $event)
                        var item = $($event.target).closest('.c-product-slider__item');
                        var index = item.attr('data-swiper-slide-index');
                        console.log('.c-product-slider__item', index);
                        $('.js-c-product-slider__magnific-popup').magnificPopup('open', index);
                    },
                }
            });


            var productMagnificPopup = $('.js-c-product-slider__magnific-popup').magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true,
                    tCounter: @json(trans('product.magnific_popup.tCounter'))
                },
                callbacks: {}
            });
            window.productMagnificPopupInstance = productMagnificPopup.instance;
            window.mySwiper = mySwiper;
        });


    </script>
@endpush














@push('scripts_list')

@endpush
