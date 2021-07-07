<div class="landing-page-item landing-page-slider  landing_page_slider  landing_page_slider_{{$item->id}} landing-page-item-{{$item->id}}   {{$item->classes}}" >

{{--    <div  class=" slider">--}}
{{--    @foreach($slides as $slide)--}}
{{--        <div class="slide-item d-block">--}}
{{--            <img src="{{$slide->image_src}}" alt="{{$slide->title}}" class="slide-img img-fluid" style="width: 100%">--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    </div>--}}

{{--{!! ddd($item) !!}--}}


    <div id="landing-page-slider-{{$item->id}}" class="carousel  slide {{$sliderType=='fade'?'carousel-fade':null}} " data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $slide)
            <div class="carousel-item @if ($loop->first) active  @endif">
                <img src="{{$slide->image_src}}" alt="{{$slide->title}}" class="d-block w-100 img-fluid"  >
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#landing-page-slider-{{$item->id}}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#landing-page-slider-{{$item->id}}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



</div>
@include('frontend.landing_pages.items.parts.common')

{{--@push('scripts_list')--}}
{{--    <script>--}}
{{--        try{--}}
{{--        $(document).ready(function () {--}}
{{--            $('.landing_page_slider_{{$item->id}} .slider').slick({--}}
{{--                dots: false,--}}
{{--                infinite: true,--}}
{{--                speed: 300,--}}
{{--                slidesToShow: 1,--}}
{{--                adaptiveHeight: false--}}
{{--            });--}}
{{--        });--}}
{{--        }catch (e) {--}}
{{--            console.error('init landing_page_slider_{{$item->id}}')--}}
{{--        }--}}

{{--    </script>--}}
{{--@endpush--}}
