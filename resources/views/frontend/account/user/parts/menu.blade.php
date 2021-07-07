@php  if(!isset($active)){ $active = 'info';}           @endphp

<div class="b-list-default">
    <div class="b-list-default__item   {{$active=='info'?'b-list-default__item_active':''}} "  >
        <a href="{{route('frontend.account.profile.show')}}" class="b-list-default__link">
{{--            Інформація--}}
            @lang('profile.menu.info')
        </a>
    </div>

    <div class="b-list-default__item {{$active=='wishlist'?'b-list-default__item_active':''}}">
        <a href="{{route('frontend.account.profile.wishlist.index')}}" class="b-list-default__link">
            @lang('profile.menu.wishlist')  ({{$_wishlistQty}})
        </a>
    </div>


    <div class="b-list-default__item {{$active=='orders'?'b-list-default__item_active':''}}">
        <a href="{{route('frontend.account.profile.order-history')}}" class="b-list-default__link">
            @lang('profile.menu.orders')
            ({{$_menuOrdersQty}})
        </a>
    </div>

    <div class="b-list-default__item ">
        <a href="{{route('frontend.account.logout')}}" class="b-list-default__link">
            @lang('profile.menu.logout')
        </a>
    </div>



</div>
