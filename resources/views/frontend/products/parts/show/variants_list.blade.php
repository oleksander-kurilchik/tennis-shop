@if($variationGroups->isNotEmpty())
    <div class="b-card-list__group">
        <div class="p-product__price-block">
            <div class="p-product-show__variants-block-list">
                @foreach($variationGroups as $variationGroup)
                    <div class="p-product-show__variants-block">
                        <div class="p-product-show__variants-block-title">
                            {{$variationGroup->title}}
                        </div>
                        <div class="p-product-show__variants-block-content">
                            <div class="c-selected-list">
                                @foreach($variationGroup->items as $variationItem)
                                    <div class="c-selected-list__item ">
                                        <a href="{{$variationItem->product->front->url}}"
                                           class="c-selected-list__item-link ">
                                            {{$variationItem->title}}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif
