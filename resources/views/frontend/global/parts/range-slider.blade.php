
<div class="b-range-slider">
    <div class="js-b-range-slider__range-block-price b-range-slider__slider "
         id="js-b-filter-block__range-block"
         data-start="{{$range->start}}" data-end="{{$range->end}}" data-min="{{$range->min}}"
         data-max="{{$range->max}}">
    </div>
    <div class="b-range-slider__block-controls">
        <div class="b-range-slider__controls-min">
            <input type="text" name="price-from" name-type="from"
                   class="b-range-slider__range-input js-b-range-slider__range-input-min" value="{{$range->start}}"
                   limit-value="{{$range->min}}">
        </div>
        <div class="b-range-slider__controls-max">
            <input name="price-to" type="text" name-type="to"
                   class="b-range-slider__range-input  js-b-range-slider__range-input-max" value="{{$range->end}}"
                   limit-value="{{$range->max}}">
        </div>
        <div class="b-range-slider__controls-apply">
            <button class="b-range-slider__button-apply  js-b-range-slider__range-button-apply">OK</button>
        </div>
    </div>
</div>


