{{--<div>--}}
  {{--<span class="btn btn-default"--}}
        {{--data-urlimage="{!!  $image_item->small_path!!}"--}}
        {{--data-toggle="modal" data-target="#image-modal-url">--}}
     {{--<span data-toggle="tooltip" data-placement="top" data-html="true"--}}
           {{--data-template='<div class="tooltip image-tooltip"  role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner "></div></div>'--}}
           {{--title='<div class="img-thumbnail"><img src="{!! $image_item->small_path !!}"></div>'>{!! $image_item->getSmallImageSize() !!}--}}
     {{--</span>--}}
 {{--</span>--}}
    {{--<span class="btn btn-default" data-urlimage="{!!  $image_item->medium_path!!}" data-toggle="modal"--}}
          {{--data-target="#image-modal-url">--}}
       {{--<span data-toggle="tooltip" data-placement="top" data-html="true"--}}
             {{--data-template='<div class="tooltip image-tooltip"  role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner "></div></div>'--}}
             {{--title='<div class="img-thumbnail"><img src="{!! $image_item->medium_path !!}"></div>'>{!! $image_item->getMediumImageSize() !!}--}}
       {{--</span>--}}
 {{--</span>--}}
    {{--<span class="btn btn-default" data-urlimage="{!!  $image_item->big_path!!}" data-toggle="modal"--}}
          {{--data-target="#image-modal-url">--}}
           {{--<span data-toggle="tooltip" data-placement="top" data-html="true"--}}
                 {{--data-template='<div class="tooltip image-tooltip"  role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner "></div></div>'--}}
                 {{--title='<div class="img-thumbnail"><img src="{!! $image_item->big_path !!}"></div>'>{!! $image_item->getBigImageSize() !!}--}}
           {{--</span>--}}
  {{--</span>--}}
    {{--<span class="btn btn-default" data-urlimage="{!!  $image_item->big_path!!}" data-toggle="modal"--}}
          {{--data-target="#image-modal-url">--}}
           {{--<span data-toggle="tooltip" data-placement="top" data-html="true"--}}
                 {{--data-template='<div class="tooltip image-tooltip"  role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner "></div></div>'--}}
                 {{--title='<div class="img-thumbnail"><img src="{!! $image_item->big_path !!}"></div>'>Оригинал--}}
           {{--</span>--}}
  {{--</span>--}}

{{--</div>--}}

<div class="images-button-wrapper pt-2 pb-4">
    <div class="" style="padding-right: 30px;padding-left: 30px">
        Зображення {!! $image_item->image_name !!} </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->small_path}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->small_path}}">
                <img src="{{ $image_item->small_path }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->small_path!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                 1x
            </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{ $image_item->medium_path}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{ $image_item->medium_path}}">
                <img src="{{  $image_item->medium_path }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!   $image_item->medium_path!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                    2x
              </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->big_path}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->big_path}}">
                <img src="{{ $image_item->big_path }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->big_path!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                    3x
            </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->origin_path}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->origin_path}}">
                <img src="{{ $image_item->origin_path }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->origin_path!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                Оригинал
            </span>
        </div>
    </div>

</div>
