<div class="b-header-menu d-none d-lg-block">
    <div class="b-header-menu__container container">
        <div class="b-header-menu__list">

            @foreach($_menuCategories as  $_menuCategoryItem)
                 <div class="b-header-menu__list-item">
                     <nav class="b-header-menu__list-item-nav">
                        <a href="{{$_menuCategoryItem->front->url}}" class="b-header-menu__item-link js-b-header-menu__item-link">
                            {{$_menuCategoryItem->trans->title}}
                        </a>
                     </nav>
                </div>
                <div class="b-header-menu__submenu-wrap js-b-header-menu__submenu-wrap" >
                    <div class="b-header-menu__submenu">
                        <div class="b-header-menu__submenu-invisible-block"></div>
                        <div class="b-header-menu__submenu-container container">
                            <div class="b-header-menu__submenu-groups-list row">
                                @foreach($_menuCategoryItem->childrens as $catChildItem)

                                    <div class="b-header-menu__submenu-group col-lg-3">
                                        <div class="b-header-menu__submenu-group-header">
                                            <a href="{{$catChildItem->front->url}}" class="b-header-menu__submenu-group-header-link">{{$catChildItem->trans->title}}</a>
                                        </div>
                                        @if($catChildItem->childrens->isNotEmpty())
                                        <div class="b-header-menu__submenu-group-list">
                                            @foreach($catChildItem->childrens   as  $subCatChildItem)
                                                <div class="b-header-menu__submenu-group-item">
                                                    <a href="{{$subCatChildItem->front->url}}" class="b-header-menu__submenu-group-link">
                                                        {{$subCatChildItem->trans->title}}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="b-header-menu__cart  d-none d-lg-block " id="cart_header_desktop">
            @if(Auth::guard('frontend')->check())
            <a href="{{route('frontend.account.profile.wishlist.index')}}"  class="b-image-primary-btn mr-2"  >
                <div class="b-image-primary-btn__logo">
                    <svg class="b-image-primary-btn__logo-img" width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.8382 3.60999C18.8066 2.57799 17.4073 1.99817 15.9482 1.99817C14.489 1.99817 13.0897 2.57799 12.0582 3.60999L10.9982 4.66999L9.93817 3.60999C7.78978 1.46161 4.30655 1.46161 2.15817 3.60999C0.00977814 5.75838 0.00977802 9.24161 2.15817 11.39L3.21817 12.45L10.9982 20.23L18.7782 12.45L19.8382 11.39C20.8702 10.3585 21.45 8.95913 21.45 7.49999C21.45 6.04086 20.8702 4.64152 19.8382 3.60999Z" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="b-image-primary-btn__qty " v-text="wishlist.count">0</div>
                </div>
                <div class="b-image-primary-btn__title">
                    @lang('header.favorite')
                </div>
            </a>
            @endif


            <a class="b-cart-button" href="{{route('frontend.cart.index')}}"  >
                <div class="b-cart-button__logo">
                    <svg  class="b-cart-button__logo-img" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="7.63592" cy="22.8182" r="2.18182" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="20.7277" cy="22.8182" r="2.18182" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.09455 6.45455H24L22.1673 15.6073C21.9614 16.6439 21.0421 17.3839 19.9855 17.3636H8.45455C7.35216 17.373 6.416 16.5585 6.27273 15.4655L4.61455 2.89818C4.47232 1.81338 3.54863 1.00166 2.45455 1H0" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="b-cart-button__qty"  v-if="cart.count" v-text="cart.count">

                    </div>
                </div>
                <div class="b-cart-button__title">
                    @lang('header.cart')
                </div>
            </a>

        </div>

    </div>


</div>

