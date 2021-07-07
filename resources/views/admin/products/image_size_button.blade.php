
<div class="images-button-wrapper  pt-2 pb-4">
    <div class="" style="padding-right: 30px;padding-left: 30px">
        Зображення {!! $image_item->image_name !!} </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->path->path_0x}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->path->path_0x}}">
                <img src="{{ $image_item->path->path_0x }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->path->path_0x!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                mini
            </span>
        </div>
    </div>
    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->path->path_1x}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->path->path_1x}}">
                <img src="{{ $image_item->path->path_1x }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->path->path_1x!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                  1x
            </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{ $image_item->path->path_2x}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{ $image_item->path->path_2x}}">
                <img src="{{  $image_item->path->path_2x }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!   $image_item->path->path_2x!!}" data-toggle="modal"
                  data-target="#image-modal-url">
               2x
            </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->path->path_3x}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->path->path_3x}}">
                <img src="{{ $image_item->path->path_3x }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->path->path_3x!!}" data-toggle="modal"
                  data-target="#image-modal-url">
              3x
            </span>
        </div>
    </div>

    <div style="display: inline-block">
        <div class="img-thumbnail  thumbnail-admin-image">
            <a href="{{$image_item->path->path_original}}" data-lightbox="{{$image_item->image_name}}"
               data-title="{{$image_item->path->path_original}}">
                <img src="{{ $image_item->path->path_original }}">
            </a>
        </div>
        <div>
            <span class="btn btn-secondary" data-urlimage="{!!  $image_item->path->path_original!!}" data-toggle="modal"
                  data-target="#image-modal-url">
                Оригинал
            </span>
        </div>
    </div>

</div>
