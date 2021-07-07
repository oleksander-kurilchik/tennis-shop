<div class="b-mobile-menu    ">
    <div class="b-mobile-menu__container h-100">
        <div class="b-mobile-menu__search-block ">
            <form action="{{route('frontend.products.search')}}" class="input-group  input-group__default  container ">
                <div class="input-group-prepend">
                    <button class="input-group__default-btn b-mobile-menu__search-submit" type="submit"
                            id="button-addon1">

                        <svg class="b-mobile-menu__search-submit-icon" width="21" height="20" viewBox="0 0 21 20"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8.33333" cy="8.33333" r="7.33333" stroke="#1D2E72" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.9999 19.9999L14.2222 14.2222" stroke="#1D2E72" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </button>
                </div>
                <input type="text" name="search" class="form-control form-control__default b-mobile-menu__search-input"
                       placeholder="@lang('header.search')..." autocomplete="off"
                        >
            </form>
        </div>

        <div class="b-mobile-menu__content-block container">
            @include('frontend.global.parts_mobile_menu.mobile_menu_categories')
        </div>


        <div class="b-mobile-menu__footer container">
            <div class="b-mobile-menu__footer-items-list">
                <div class="b-mobile-menu__footer-item">
                    <a href="{{config('site.social.instagram')}}"  target="_blank" class="b-mobile-menu__footer-instagram">
                        <svg class="b-mobile-menu__footer-instagram-icon" width="25" height="24" viewBox="0 0 25 24"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M23.2075 4.14368C23.5005 4.9032 23.705 5.77972 23.7608 7.05469C23.8165 8.33441 23.8213 8.74219 23.8213 12C23.8213 15.2578 23.8073 15.6656 23.7515 16.9453C23.6957 18.2203 23.491 19.0922 23.1982 19.8563C22.5797 21.4688 21.3148 22.7437 19.715 23.3672C18.9617 23.6625 18.0921 23.8687 16.8273 23.9249C15.5577 23.9813 15.1532 23.9952 11.9212 23.9952C8.68926 23.9952 8.28454 23.9813 7.01515 23.9249C5.75013 23.8687 4.88528 23.6625 4.12725 23.3672C3.33669 23.0673 2.6159 22.5938 2.02062 21.9844C1.41609 21.3843 0.946514 20.6625 0.644245 19.8563C0.35124 19.0968 0.146518 18.2203 0.0907506 16.9453C0.0349833 15.6656 0.0209961 15.2578 0.0209961 12C0.0209961 8.74219 0.0349833 8.33441 0.0954735 7.04993C0.151241 5.77496 0.355781 4.9032 0.648786 4.1391C0.946514 3.34222 1.41609 2.61566 2.02062 2.01562C2.6159 1.40149 3.33197 0.932739 4.13197 0.628052C4.88528 0.332886 5.75485 0.126526 7.01969 0.0703125C8.28926 0.0140991 8.6938 0 11.9258 0C15.1577 0 15.5623 0.0140991 16.8365 0.0750732C18.1014 0.131287 18.9664 0.337463 19.7243 0.632812C20.5148 0.932739 21.2356 1.40625 21.8309 2.01562C22.4402 2.61566 22.9052 3.33746 23.2075 4.14368ZM21.2078 19.0781C21.3706 18.6562 21.5659 18.0234 21.6171 16.8516C21.6729 15.5859 21.6868 15.2109 21.6868 12.0093C21.6868 8.80774 21.6729 8.42816 21.6171 7.16254C21.5659 5.99524 21.3706 5.35785 21.2078 4.93597C21.0171 4.41559 20.7148 3.94684 20.3195 3.55774C19.9383 3.1593 19.4685 2.85461 18.9524 2.66254C18.5339 2.49847 17.9061 2.30164 16.7435 2.25C15.4925 2.19379 15.1159 2.17969 11.935 2.17969C8.75901 2.17969 8.38227 2.19379 7.12669 2.25C5.96884 2.30164 5.33632 2.49847 4.9178 2.66254C4.40154 2.85461 3.93651 3.1593 3.55068 3.55774C3.15068 3.94226 2.84841 4.41559 2.65768 4.93597C2.49492 5.35785 2.29964 5.99066 2.2486 7.16254C2.19265 8.4234 2.17884 8.80774 2.17884 12.0093C2.17884 15.2109 2.19265 15.5907 2.2486 16.8563C2.29964 18.0234 2.49492 18.661 2.65768 19.0829C2.84841 19.6031 3.15068 20.0718 3.54596 20.4609C3.92725 20.8594 4.397 21.1641 4.91307 21.3563C5.3316 21.5204 5.95939 21.7172 7.12196 21.7687C8.373 21.8251 8.75429 21.839 11.9305 21.839C15.1067 21.839 15.4832 21.8251 16.7388 21.7687C17.8968 21.7172 18.5292 21.5204 18.9477 21.3563C19.9848 20.9531 20.8078 20.1235 21.2078 19.0781Z"
                                  fill="#1D2E72"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.81055 12C5.81055 8.5968 8.54968 5.83594 11.9257 5.83594C15.3019 5.83594 18.0408 8.5968 18.0408 12C18.0408 15.4032 15.3019 18.1641 11.9257 18.1641C8.54968 18.1641 5.81055 15.4032 5.81055 12ZM7.95895 12C7.95895 14.2079 9.73551 15.9985 11.9257 15.9985C14.1161 15.9985 15.8924 14.2079 15.8924 12C15.8924 9.79211 14.1161 8.00153 11.9257 8.00153C9.73551 8.00153 7.95895 9.79211 7.95895 12Z"
                                  fill="#1D2E72"/>
                            <path
                                d="M19.7104 5.59222C19.7104 6.3869 19.0711 7.03125 18.2826 7.03125C17.4942 7.03125 16.855 6.3869 16.855 5.59222C16.855 4.79736 17.4942 4.1532 18.2826 4.1532C19.0711 4.1532 19.7104 4.79736 19.7104 5.59222Z"
                                fill="#1D2E72"/>
                        </svg>

                    </a>
                </div>
                <div class="b-mobile-menu__footer-item b-mobile-menu__footer-item-phones">
                    <div class="b-mobile-menu__footer-phone-list">
                        <a href="{{config('site.header_phone_1_value')}}" class="b-mobile-menu__footer-phone-item">{{config('site.header_phone_1_title')}}</a>
                        <a href="{{config('site.header_phone_2_value')}}" class="b-mobile-menu__footer-phone-item">{{config('site.header_phone_2_title')}}</a>
                    </div>
                </div>
                <div class="b-mobile-menu__footer-item">
                    <div class="b-mobile-menu__footer-lang-list">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="b-mobile-menu__footer-lang-item {{$localeCode==app()->getLocale()?'b-mobile-menu__footer-lang-item_active':''}}">{{$localeCode}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
