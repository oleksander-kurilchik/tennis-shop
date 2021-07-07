import noUiSlider from "nouislider";

function redirectToFilter() {
    let arrQuery = [];
    var arrays_id = [];
    $(' input:checked.js-b-filter-block__filter-item-input').each(
        function (index, value) {
            arrays_id.push(parseInt($(this).val()));
        }
    );
    if (arrays_id.length > 0) {
        arrQuery.push("filters=" + arrays_id.sort(function(a, b) {
            return a - b;
        }).join("-"));
    }

////////////////////categories
    arrays_id = [];
    $(' input:checked.js-b-filter-block__categories-item-input').each(
        function (index, value) {
            arrays_id.push($(this).val());
        }
    );
    if (arrays_id.length > 0) {
        arrQuery.push("categories=" + arrays_id.sort(function(a, b) {
            return a - b;
        }).join("-"));
    }
/////////////////////////////////////////
//     js-p-catalog__select-sorting
    let $sortingOption = $('.js-p-catalog__select-sorting').find('option:selected');
    if ($sortingOption.length && $sortingOption.attr('data-type') ){
        let $sortValue =  $sortingOption.attr('data-type');
        arrQuery.push( "sorting=" + $sortValue);
    }







    let priceFromInput = $('.js-b-range-slider__range-input-min ');
    let priceToInput = $('.js-b-range-slider__range-input-max');
    let priceFrom = parseInt( priceFromInput.val());
    let priceMin = parseInt(priceFromInput.attr('limit-value'));
    let priceTo = parseInt(priceToInput.val());
    let priceMax = parseInt(priceToInput.attr('limit-value'));
    if (!isNaN(priceFrom) && priceFrom > priceMin) {
        arrQuery.push( "price-from=" + priceFrom);
    }
    if (!isNaN(priceTo) && priceTo < priceMax) {
        arrQuery.push( "price-to=" + priceTo);
    }














    if (arrQuery.length > 0) {
        window.location.href = window.location.href.split('?')[0] + '?' + arrQuery.join('&');
    } else {
        window.location.href = window.location.href.split('?')[0];
    }
    return;
}

var timeoutRedirectToFilter = null;
window.redirectToFilter = redirectToFilter;
$('.js-b-filter-block__filter-item-input ,.js-b-filter-block__vendors-item-input  ,.js-b-filter-block__categories-item-input ') .change(function(){
    if($(document).width()>=992)
    {
        clearTimeout(timeoutRedirectToFilter);
        timeoutRedirectToFilter = setTimeout(function (){
            redirectToFilter();
        },500);
    }
 });
// $('.c-category-sorting__select-sorting')     .change(redirectToFilter);
// $('.category-filter-available__value-item-input')     .change(redirectToFilter);
// $('.c-category-sorting__select-brand')               .change(redirectToFilter);
  $(".js-b-range-slider__range-button-apply, .js-b-filter-block__apply-filter")             .click(redirectToFilter);
//   $(".js-category-menu-to-mobile__filter-button")             .click(redirectToFilter);




