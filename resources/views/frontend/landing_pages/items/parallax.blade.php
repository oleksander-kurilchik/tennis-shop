<div class="container-fluid  landing-page-item  landing-page-parallax  landing-page-item-{{$item->id}}  landing-page-item-{{$parallax->aligment}}    {{$item->classes}} ">
    <div class="row">
        <div id="landing_page_parallax_{{$item->id}}" class=" landing-page-parallax-item   col-12 p-0" >
            <img class="landing-page__parallax-image"  id="landing_page_parallax_image_{{$item->id}}" src="{{$parallax->image_src}}" alt="" >
        <div class="container parallax-item___container">
            <div class="parallax-item_content_wrap align-content-stretch "  >
             <div class="parallax-item_content">{!!  $parallax->description!!}</div>
            </div>
        </div>

        </div>
    </div>

</div>
@push('scripts_list')
    @php
      $_direction = $parallax->parallax_direction;
    @endphp

@endpush
@push('scripts_list')
    <script>
        try {
            $(document).ready(function () {
                var image = document.getElementById('landing_page_parallax_image_{{$item->id}}');
                new simpleParallax(image, {
                    orientation: '{{$parallax->orientation}}',
                    scale: '{{$parallax->scale}}'

                });
                setTimeout(function (){
                    var someImages = document.querySelectorAll('#landing_page_parallax_image_{{$item->id}}');
                    objectFitImages(someImages);
                },200)

            })
        }catch (e) {
            console.error('init landing_page_parallax_{{$item->id}}')
        }

    </script>

@endpush
@include('frontend.landing_pages.items.parts.common')
