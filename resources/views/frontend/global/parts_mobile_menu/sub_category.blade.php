<div class="c-mobile-group-secondary"  >
    <div class="c-mobile-group-secondary__title">
        <a class="c-mobile-group-secondary__title-link"
           @if($category->childrens->isNotEmpty())
           data-toggle="collapse"
           href="#c-mobile-group-secondary__content_{{$category->id}}" role="button"
           aria-expanded="false"
           aria-controls="c-mobile-group-secondary__content_{{$category->id}}"
           @else
           href="{{$category->front->url}}"
           @endif  >
            {{$category->trans->title}}


            @if($category->childrens->isNotEmpty())
                <span class="c-mobile-group-secondary__title-icon-wrap">
                                <svg class="c-mobile-group-secondary__title-icon" width="10" height="6" viewBox="0 0 10 6" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.75078 5.875C4.91693 6.04167 5.08307 6.04167 5.24922 5.875L9.85981 1.28125C10.0467 1.09375 10.0467 0.916667 9.85981 0.75L9.26791 0.125C9.081 -0.0416667 8.90446 -0.0416667 8.73832 0.125L5 3.84375L1.26168 0.125C1.09553 -0.0416667 0.919003 -0.0416667 0.732087 0.125L0.140187 0.75C-0.046729 0.916667 -0.046729 1.09375 0.140187 1.28125L4.75078 5.875Z"
                                        fill="#1D2E72"/>
                                </svg>
                            </span>
            @endif

        </a>


    </div>

    @if($category->childrens->isNotEmpty())
    <div class="c-mobile-group-secondary__content collapse"  data-parent="#c-mobile-group__content_{{$parent->id}}"
         id="c-mobile-group-secondary__content_{{$category->id}}">
        <div class="c-mobile-group-secondary__list">
            @foreach($category->childrens  as $subCatChildItem)
                <div class="c-mobile-group-secondary__item">
                    <a href="{{$subCatChildItem->front->url}}"
                       class="c-mobile-group-secondary__item-link">
                        {{$subCatChildItem->trans->title}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif


</div>
