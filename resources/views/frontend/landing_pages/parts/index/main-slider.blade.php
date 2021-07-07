<div class="b-main-slider ">
    <div class="b-main-slider__row">
        <div class="b-main-slider__banner">
            <div class="swiper-container    js-b-main-slider__banner">
                <div class="swiper-wrapper">
                    @foreach($sliders as $key => $item)
                        <div class="swiper-slide b-main-slider__banner-slide " data-index="{{$key}}" >
                            <picture class="b-main-slider__banner-slide-picture d-none d-lg-block">
                                <source  type="image/webp"  srcset="{{$item->image->path_1x_webp}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">
{{--                                <source  type="image/jpg"  srcset="{{$item->image->path_1x}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">--}}

                                <img src="{{$item->image->path_1x}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">
                            </picture>


                            <picture class="b-main-slider__banner-slide-picture d-lg-none">
                                <source  type="image/webp"  srcset="{{$item->imageSm->path_1x_webp}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">
                                {{--                                <source  type="image/jpg"  srcset="{{$item->image->path_1x}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">--}}

                                <img src="{{$item->imageSm->path_1x}}"   alt="" class="b-main-slider__banner-slide-image img-fluid">
                            </picture>

{{--                            <div class="position-absolute text-success " style="z-index: 10;left: 10px; top:10px">{{$key}}</div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="b-main-slider__thumb">
            <div class="b-main-slider__thumb-wrap-container">
                <div class="b-main-slider__thumb-container">
                    <div class="swiper-container    js-b-main-slider__thumb" data-count="6">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $key => $item)
                                <div class="swiper-slide b-main-slider__thumb-slide position-relative" data-index="{{$key}}" >
                                    <picture class="b-main-slider__thumb-slide-picture">
                                        <source  type="image/webp"  srcset="{{$item->image->path_1x_webp}}"   alt="" class="b-main-slider__thumb-slide-image">
                                         <img src="{{$item->image->path_1x}}"   alt="" class="b-main-slider__thumb-slide-image">
                                    </picture>


{{--                                    <div class="position-absolute text-success " style="z-index: 10;left: 10px; top:10px">{{$key}}</div>--}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-main-slider__pagination">
            <div class="b-main-slider__swiper-pagination js-b-main-slider__swiper-pagination swiper-pagination">

            </div>
        </div>
    </div>
</div>
