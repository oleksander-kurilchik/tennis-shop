<meta name="description" content="@section('seo_description') {{config('site.seo.description')}} @show">
<meta name="Keywords" content="@section('seo_keywords'){{config('site.seo.keywords' )}}@show">
<title>@section('seo_title')@show {{config('site.seo.site_name_title')}} </title>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,600;0,900;1,400;1,500;1,600;1,900&display=swap" rel="stylesheet">
{!! Html::style(mix('/css/app.css'),[]) !!}

<meta name="author" content="trek-st.com">
<script type='application/ld+json'>
    {!! config('site.schema_org.company','{}') !!}
</script>
<meta name="csrf-token" content="{{csrf_token()}}">


<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
@stack("head_meta")




<script>
    window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token(), ]) !!};
    window.lang = "{{App::getLocale() }}";
    window.captcha = "{{config("captcha.sitekey")}}";
    const store = {
        cart: {
            count: {{$_cartValue['count']}},
            totalPrice: {{$_cartValue['totalPrice']}},
            code: '{{$_cartValue['code']}}',
            items: {!!json_encode( $_cartValue['items']) !!}
        },
        wishlist:{
            count:@json($_wishlistQty),
            show:@json(Auth::guard('frontend')->check() )
        }

    }
    window.store = store;
</script>

<script>
    window.routes = {
        cart: {
            add: "{{route("frontend.cart.add")}}",
            {{--buy_one_click: "{{route("frontend.cart.buy-one-click")}}",--}}
            all: "{{route("frontend.cart.all-cart")}}",
            change_count: "{{route("frontend.cart.change-count")}}",
            delete_from_cart: "{{route("frontend.cart.delete-from-cart")}}",
            get_warehouses: "{{route("frontend.cart.get-warehouses")}}",
            order_submit: "{{route("frontend.cart.order-submit")}}",
            success: "{{route("frontend.cart.success")}}",
        },
        wishlist:{
            add: "{{route("frontend.account.profile.wishlist.add")}}",
            remove: "{{route("frontend.account.profile.wishlist.remove")}}",
        },
        reviews:{
            product:"{{route("frontend.reviews.product")}}",
            add:"{{route("frontend.reviews.add")}}"
        },
        {{--product:{search_json: "{{route('frontend.products.searchJson')}}" },--}}
        {{--    reviews:{--}}
        {{--        product:"{{route("frontend.reviews.product")}}",--}}
        {{--        add:"{{route("frontend.reviews.add")}}"--}}
        {{--    },--}}
        feedback: {send: @json(route('frontend.feedback.send')) },
        {{--inform_availability: {send: @json(route('frontend.inform_availability.send')) }--}}

    }
</script>

@stack("head")
@section('breadcrumbs_json_ld') @show
