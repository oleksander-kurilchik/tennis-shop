/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import {ValidationProvider} from 'vee-validate';
import {ValidationObserver} from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('cart-product-item', require('./components/CartProductItem.vue').default);
Vue.component('vue-custom-spin', require('./components/CustomSpinBox.vue').default);
Vue.component('products-reviews', require('./components/ProductReviews.vue').default);
Vue.component('vue-delivery', require('./components/Delivery.vue').default);


import { VueMaskDirective } from 'v-mask'
Vue.directive('mask', VueMaskDirective);
class TrekConsole {
    static log() {
        if (window._debug == true) {
            console.log.apply(console, arguments);
        }
    }
}

window.TrekConsole = TrekConsole;

import Swiper from 'swiper/bundle';
window.Swiper = Swiper;
import noUiSlider from 'nouislider';
window.noUiSlider = noUiSlider;
import SimpleBar from 'simplebar';
window.SimpleBar  = SimpleBar;
import 'select2/dist/js/select2.full.js'
require ('magnific-popup');





require('./components/customSpinBox.js')


jQuery.openModalNotyfy = function (title, content) {
    $('#modalNotyfy').find('.b-site-modal__title').text(title);
    $('#modalNotyfy').find('.b-site-modal__description').html(content);
    $('#modalNotyfy').modal('show');

};
jQuery.closeModalNotyfy = function () {
    $('#modalNotyfy').modal('hide');
};


jQuery.openModalCartAdd = function (content) {

    var $cart_text = 'Товар додано в кошик';

    // $('#modalCartAdd').find('.cart-add-modal__title').text($cart_text);
    $('#modalCartAdd').find('.b-cart-add-modal__message').html(content);
    $('#modalCartAdd').modal('show');

};
jQuery.closeModalCartAdd = function () {
    $('#modalCartAdd').modal('hide');
};









$(document).ready(function () {
    window.mainPageSlider = null;

    var mainPageSliderThumbTimer = null;
    var mainPageSliderTimer = null;
    var initiator = 0;


    var mainPageSliderThumb = new Swiper('.js-b-main-slider__thumb', {
        direction: 'vertical',
        // autoHeight:true,
        slidesPerView: 2,
        spaceBetween: 40,

        updateOnWindowResize: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        slideToClickedSlide: true,
        loop:true,

        autoplay: {
            delay: 5000,
        },
        on:{
            slideChangeTransitionStart:function (swiper){

                if(initiator !=0){
                    return
                }
                initiator = 1;

                var totalCount = parseInt($('.js-b-main-slider__thumb').attr('data-count'))

                var currentIndex = $('.js-b-main-slider__thumb  .b-main-slider__thumb-slide.swiper-slide-active').attr('data-index')
                var currentIndex = parseInt(currentIndex);

                if(!window.mainPageSlider){
                    initiator =0;
                    return ;
                }
                console.log('mainPageSliderThumb currentIndex' , currentIndex, 'totalcount',totalCount)
                clearTimeout(mainPageSliderThumbTimer);
                clearTimeout(mainPageSliderTimer);
                mainPageSliderThumbTimer = setTimeout(function (){
                    let slideTo = 0;
                       if(currentIndex == 0){
                            slideTo =totalCount-1
                       }
                      else{
                           slideTo = currentIndex - 1;
                      }
                    console.log('mainPageSliderThumb slideTo' , slideTo)
                    window.mainPageSlider.slideToLoop(slideTo);
                      initiator = 0;

                },100);

            }
        },


        breakpoints: {
            992: {

                spaceBetween: 22
            },
            1200: {

                spaceBetween: 27
            },
            1470: {

                spaceBetween: 35
            },
            100000: {
                spaceBetween: 40
            }
        }
    })




    window.mainPageSlider = new Swiper('.js-b-main-slider__banner', {
        direction: 'horizontal',
        loop: true,
        autoHeight:true,
        slideToClickedSlide: true,
        watchSlidesVisibility: true,
       watchSlidesProgress: true,
        // freeMode: true,
        //effect:"fade",
        thumbs: {
            // swiper: mainPageSliderThumb
        },
        pagination: {
            el: '.js-b-main-slider__swiper-pagination',
            renderBullet: function (index, className) {
                return '<span class="b-main-slider__swiper-pagination-item"> <span class="' + className + '"></span></span>';
            },
        },
        // autoplay: {
        //     delay: 5000,
        // },
        on: {
            slideChangeTransitionStart:function (swiper){
                if(initiator !=0){
                    return
                }
                initiator = 1
                // console.log('slideChange',swiper, swiper.activeIndex);
                console.log('slideChange', swiper.activeIndex);
                var totalCount =  swiper.slides.length -2;
                var currentIndex = $('.js-b-main-slider__banner .b-main-slider__banner-slide.swiper-slide-active').attr('data-index')
                console.log('slideChangeTransitionStart',swiper,currentIndex ,totalCount)

                mainPageSliderThumb.slideToLoop(parseInt(currentIndex) );
                clearTimeout(mainPageSliderTimer);
                mainPageSliderTimer = setTimeout(function (){

                    let slideTo = 0
                    if(currentIndex == totalCount-1){
                        // mainPageSliderThumb.slideTo(1);
                        slideTo = 0;
                    }
                    else{
                        slideTo = parseInt(currentIndex) + 1;
                    }
                    console.log('slideTo',slideTo);
                    mainPageSliderThumb.slideToLoop(parseInt(slideTo),50);
                    initiator = 0;
                },100);

            }
        },
    });



});


function swiperRenderFraction (currentClass, totalClass) {
    return '<span class="b-slider__controls-text-1 ' + currentClass + '"></span>' +
        ' <span class="b-slider__controls-text-2">/</span> ' +
        '<span class=" b-slider__controls-text-3 ' + totalClass + '"></span>';
}

function createSwiperSlider($class){



    var productSlider = new Swiper($class, {
        direction: 'horizontal',
         autoHeight:false,
        slidesPerView: 4,
        spaceBetween: 40,
        navigation: {
            nextEl: $($class).closest('.b-slider').find('.js-b-slider__next-btn').get(0),
            prevEl:  $($class).closest('.b-slider').find('.js-b-slider__prev-btn').get(0),
        },
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: $($class).closest('.b-slider').find('.js-b-slider__counter-text').get(0),
            type: 'fraction',
            renderFraction: swiperRenderFraction
        },
        breakpoints: {
            // when window width is >= 320px
            0: {
                slidesPerView: 1,
                spaceBetween: 15
            },

            369: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            },  992: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            // when window width is >= 640px
            1200: {
                slidesPerView: 4,
                spaceBetween: 30
            },
            // 1200: {
            //     slidesPerView: 4,
            //     spaceBetween: 30
            // }
        }




    })


}



$(document).ready(function (){

    // createSwiperSlider('.js-b-slider__swiper-container');
    createSwiperSlider('.js-b-slider-similar-products__swiper-container');
    createSwiperSlider('.js-b-slider-last-viewed__swiper-container');
    createSwiperSlider('.js-b-main-page-buyers-choice-slider');
    createSwiperSlider('.js-b-mainpage-profitable');
    createSwiperSlider('.js-b-main-page-news-slider');

    // var productSlider = new Swiper('.js-b-slider__swiper-container', {
    //     direction: 'horizontal',
    //     // autoHeight:true,
    //     slidesPerView: 4,
    //     spaceBetween: 40,
    //     navigation: {
    //         nextEl: '.b-slider   .js-b-slider__next-btn',
    //         prevEl: '.b-slider  .js-b-slider__prev-btn',
    //     },
    //     autoplay: {
    //         delay: 5000,
    //     },
    //     pagination: {
    //         el: '.js-b-slider__counter-text',
    //         type: 'fraction',
    //         renderFraction: swiperRenderFraction
    //     },
    // })

})










$(document).ready(function () {

    let $slider = $('.js-b-range-slider__range-block-price');


    $slider.each(function(id, element){
        let start = parseInt($(element).attr('data-start'))||0;
        let end = parseInt($(element).attr('data-end'))||1;
        let min = parseInt($(element).attr('data-min'))||0;
        let max = parseInt($(element).attr('data-max'))||1000;



        noUiSlider.create(element, {
            start: [start, end],
            connect: true,
            step: 1,
            range: {
                'min': min,
                'max': max
            }
        });

        element.noUiSlider.on('update', function (values, handle) {


            //  console.log('element.noUiSlider.on(\'update\'',values, handle );
            // var value = values[handle];
            if (handle == 0) {
                //     inputNumber.value = value;
                $(element).closest('.b-range-slider').find('.js-b-range-slider__range-input-min').val(parseInt(values[0]));

            } else if (handle == 1) {
                $(element).closest('.b-range-slider').find('.js-b-range-slider__range-input-max').val(parseInt(values[1]));
            }

        });

        $(element).closest('.b-range-slider').find('.js-b-range-slider__range-input-min').change(function () {
            element.noUiSlider.set([$(this).val(), null]);
        });
        $(element).closest('.b-range-slider').find('.js-b-range-slider__range-input-max').change(function () {
            element.noUiSlider.set([null, $(this).val()]);
        });



    });
})



$(document).ready(function () {
    $('.js-add-product-to-cart-input').customSpin({min:1});
});


$(document).ready(function () {
    $('.js-b-header__mobile-menu').click(function(){
        $('.js-b-header__mobile-menu').toggleClass('b-header__mobile-menu_active');
        $('.b-mobile-menu').toggleClass('b-mobile-menu_active');
        $('body').toggleClass('opened-mobile-menu');

    });
});





//
// $(document).ready(function () {
//     $('.js-b-header-menu__item-link').mouseover(function (){
//         console.log('.js-b-header-menu__item-link\').mouseover');
//         $('.js-b-header-menu__submenu-wrap').addClass('b-header-menu__submenu-wrap_active')
//
//
//     })
//     $('.js-b-header-menu__item-link').mouseleave(function (){
//         console.log('$(\'.js-b-header-menu__item-link\').mouseeleave');
//         $('.js-b-header-menu__submenu-wrap').removeClass('b-header-menu__submenu-wrap_active')
//     })
// });



$(document).ready(function () {
    $('.js-p-catalog__select-sorting').select2({
        placeholder: 'This is my placeholder',
        minimumResultsForSearch: Infinity,
        debug: true,
        dropdownCssClass: 'select2-dropdown__custom-primary',
        containerCssClass: 'select2-container__custom-primary',
    //    closeOnSelect: false,

        // allowClear: true,
        // dropdownAutoWidth : true,
        width: 'auto'
        // adaptContainerCssClass:'select2-adapt-container__custom',
        // adaptDropdownCssClass:'select2-adapt-dropdown__custom',
        //templateResult: formatState
    });
    $('.js-p-catalog__select-sorting').change(function () {
        console.log('.js-p-catalog__select-sorting', $(this))
        let value = $(this).val();
       window.location.href = value;
    })
});


























require('./cart');
require('./components/categoriesFilters');
require('./components/wishlist');



const product_reviews_block = new Vue({
    el: '#product_reviews_block',
    data: {

    },

    methods: {
    },
    mounted: function () {


    }
});
window.product_reviews_block = product_reviews_block;













//////////////pashalka

function checkLeftTop($point){
    if($point.x < 50 && $point.y < 50){
        return  true;
    }

    return false;
}
function checkRightTop($point){
    if(($point.w - $point.x < 50) && $point.y < 50){
        return  true;
    }
    return false;
}



function checkLeftBottom($point){
    if($point.x < 50  &&($point.h -  $point.y) < 50){
        return  true;
    }
    return false;
}




function checkRightBottom ($point){
    if(($point.w - $point.x < 50) &&($point.h -  $point.y) < 50){
        return  true;
    }
    return false;
}


function checkCenter($point){
    if(( Math.abs(   $point.w/2 - $point.x)     < 50) &&Math.abs( ($point.h/2 -  $point.y)) < 50){
        return  true;
    }
    return false;
}




let $indexCombination = 0;
let $combinations = {
    lt:checkLeftTop,
    lb:checkLeftBottom,
    rt:checkRightTop,
    rb:checkRightBottom,
    c:checkCenter,
}

$(document).on("click", "body", function (event) {

    var point = {
        x:event.clientX,
        y:event.clientY,
        w: window.innerWidth,
        h:window.innerHeight,
    };

    // console.log('checkLeftTop',checkLeftTop(point));
    // console.log('checkRightTop',checkRightTop(point));
    // console.log('checkLeftBottom',checkLeftBottom(point));
    // console.log('checkRightBottom',checkRightBottom(point));
    // console.log('checkCenter',checkCenter(point));


    var keyCombination = ['lt','rt','rb','lb','c'];
    if($combinations[keyCombination[$indexCombination]](point)){
        $indexCombination++;
    }
    else{
        $indexCombination=0;
    }
    console.log('indexCombination',$indexCombination);
    if($indexCombination  == keyCombination.length){
        alert('Приветствую тебя создатель')
        $indexCombination=0;
    }


} );




$(document).ready(function (){
    $('.js-b-search-form__input').focusin(function (){
        $(this).addClass('b-search-form__input_active');
    })

    $('.js-b-search-form__input').focusout(function (){
        let self  = this;
        setTimeout(function (){
            $(self).removeClass('b-search-form__input_active');
        },1000)
    })
})


$(document).ready(function (){
    $('.js-b-card-list__group-item-show-more').click(function (){
        let $closest = $(this).closest('.b-card-list__group-content');
        $closest.find('.b-card-list__group-item:nth-child(1n+8), .js-b-card-list__group-item-hide').removeClass('d-none');
        $closest.find('.js-b-card-list__group-item-show-more').addClass('d-none');
    })

    $('.js-b-card-list__group-item-hide').click(function (){
        let $closest = $(this).closest('.b-card-list__group-content');
        $closest.find('.b-card-list__group-item:nth-child(1n+8), .js-b-card-list__group-item-hide').addClass('d-none');
        $closest.find('.js-b-card-list__group-item-show-more').removeClass('d-none');
    })

})

$(document).ready(function (){
    $('.js-category-show-filters').click(function (){
        $('.p-catalog__filters').addClass('p-catalog__filters_active');
        $('body').addClass('opened-filters-menu');

    })

    $('.js-category-close-filters').click(function (){
        $('.p-catalog__filters').removeClass('p-catalog__filters_active');
        $('body').removeClass('opened-filters-menu');

    })


})

//js-b-search-form__input


require('./components/landing_pages/landing_pages');
require('./feedbackForm');


