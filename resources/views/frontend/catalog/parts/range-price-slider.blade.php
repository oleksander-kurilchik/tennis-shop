
<div class="b-range-slider">
    <div class="js-b-range-slider__range-block-price b-range-slider__slider "
         id="js-b-filter-block__range-block"
         data-start="{{$priceRange->start}}" data-end="{{$priceRange->end}}" data-min="{{$priceRange->min}}"
         data-max="{{$priceRange->max}}">
    </div>
    <div class="b-range-slider__block-controls">
        <div class="b-range-slider__controls-min">
            <div class="b-range-slider__range-input-label">@lang('category.from')</div>
            <input type="text" name="price-from" name-type="from"
                   class="b-range-slider__range-input js-b-range-slider__range-input-min" value="{{$priceRange->start}}"
                   limit-value="{{$priceRange->min}}" autocomplete="off">
        </div>
        <div class="b-range-slider__controls-max">
            <div class="b-range-slider__range-input-label">@lang('category.to')</div>
            <input name="price-to" type="text" name-type="to"
                   class="b-range-slider__range-input  js-b-range-slider__range-input-max" value="{{$priceRange->end}}"
                   limit-value="{{$priceRange->max}}"  autocomplete="off">
        </div>
        <div class="b-range-slider__controls-apply">
            <button class="b-range-slider__button-apply  js-b-range-slider__range-button-apply">OK</button>
        </div>
    </div>
</div>


