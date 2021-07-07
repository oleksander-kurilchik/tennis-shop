<div class="container-fluid   landing-page-youtube landing-page-item-{{$item->id}}   {{$item->classes}}">
 <div class="row">
        <div class="col-12 embed-responsive embed-responsive-16by9 landing-page-youtube__content landing_page_item_{{$item->id}}" style="z-index: 1" >
             <img class="img-fluid landing-page-youtube__youtube-image-preview youtube-image-preview w-100 " style="position: absolute; top:0;left: 0" src="https://img.youtube.com/vi/{{$item->value}}/maxresdefault.jpg" alt="">
        </div>
    </div>
</div>
@include('frontend.landing_pages.items.parts.common')

@push('scripts_list')
<script>
    try{
    $(document).ready(function () {
        var player =  $('.landing_page_item_{{$item->id}}').YTPlayer({
            fitToBackground: true,
            videoId: '{{$item->value}}',
            playerVars: {
                modestbranding: 0,
                autoplay: 1,
                controls: 0,
                showinfo: 0,
                wmode: 'transparent',
                branding: 0,
                rel: 0,
                autohide: 0,
                origin: window.location.origin
            },
            callback: function(event) {
                console.log(this,event);
                player.data('ytPlayer').player.addEventListener('onStateChange', function(event){
                    if (event.data == YT.PlayerState.PLAYING ) {
                        if(!$('.landing_page_item_{{$item->id}} .youtube-image-preview').hasClass('d-none')) {
                            $('.landing_page_item_{{$item->id}} .youtube-image-preview').stop().animate({opacity: 0}, 2000, function () {
                                $('.landing_page_item_{{$item->id}} .youtube-image-preview').addClass('d-none');
                            });
                        }
                        console.log('YT.PlayerState.PLAYING');
                    }
                    else{
                        {{--if($('.landing_page_item_{{$item->id}} .youtube-image-preview').hasClass('d-none')) {--}}
                        {{--    --}}{{--$('.landing_page_item_{{$item->id}} .youtube-image-preview').stop().animate({opacity: 0}, 100, function () {--}}
                        {{--        $('.landing_page_item_{{$item->id}} .youtube-image-preview').removeClass('d-none');--}}
                        {{--    $('.landing_page_item_{{$item->id}} .youtube-image-preview').css('opacity',1);--}}
                        {{--    // });--}}
                        {{--}--}}
                        {{--console.log('YT.PlayerState.PLAYING else');--}}
                    }


                    {{--$('.landing_page_item_{{$item->id}} .youtube-image-preview').fadeOut()--}}


                });
            }
        });

    });

    }catch (e) {
        console.error('init landing_page_youtube_{{$item->id}}')
    }
</script>

@endpush