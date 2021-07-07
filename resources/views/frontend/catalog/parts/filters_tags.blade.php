<div class="c-tags">

    @foreach($tagCollection as $tag)

        <div class="c-tags__group">
            <div class="c-tags__group-title">{{$tag->title}}</div>
            <div class="c-tags__group-list">
                @foreach($tag->items as $item)
                    <div class="c-tags__item">
                        <a href="{{$item->url}}" rel="nofollow" class="c-tags__item-link">{{$item->title}}
                            <span class="c-tags__item-link-close"></span>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    @endforeach

{{--    <div class="c-tags__group">--}}
{{--        <div class="c-tags__group-title">ціна</div>--}}
{{--        <div class="c-tags__group-list">--}}

{{--            <div class="c-tags__item">--}}
{{--                <a href="#" class="c-tags__item-link"><span>1000 – 2500 грн </span><span class="c-tags__item-link-close"></span></a>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="c-tags__group">--}}
{{--        <div class="c-tags__group-title">матеріал</div>--}}
{{--        <div class="c-tags__group-list">--}}

{{--            <div class="c-tags__item">--}}
{{--                <a href="#" class="c-tags__item-link">скло  <span class="c-tags__item-link-close"></span>  </a>--}}
{{--            </div>--}}
{{--            <div class="c-tags__item">--}}
{{--                <a href="#" class="c-tags__item-link">дерево <span class="c-tags__item-link-close"></span></a>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}


{{--    <div class="c-tags__group">--}}
{{--        <div class="c-tags__group-title">висота</div>--}}
{{--        <div class="c-tags__group-list">--}}

{{--            <div class="c-tags__item">--}}
{{--                <a href="#" class="c-tags__item-link">50 – 180 см <span class="c-tags__item-link-close"></span></a>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}


    <div class="c-tags__group">

        <div class="c-tags__group-list">

            <div class="c-tags__item c-tags__item-clear">
                <a href="{{url()->current().(request()->get('sorting')?'?sorting='.request()->get('sorting'):'')}}" class="c-tags__item-link">  Очистити все <span class="c-tags__item-link-close"></span></a>
            </div>

        </div>

    </div>






</div>
