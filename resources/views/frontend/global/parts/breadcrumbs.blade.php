
@php   if(!isset($name)){$name = 'frontend.index'; }                          @endphp
<div class="b-breadcrumbs-container container">
{{--    <nav aria-label="breadcrumb ">--}}
{{--        <ol class="breadcrumb b-breadcrumb">--}}
{{--            <li class="breadcrumb-item"><a href="#">Головна</a></li>--}}
{{--            <li class="breadcrumb-item"><a href="#">Каталог</a></li>--}}
{{--            <li class="breadcrumb-item"><a href="#">Ракетки</a></li>--}}
{{--            <li class="breadcrumb-item"><a href="#">Ракетки</a></li>--}}
{{--            <li class="breadcrumb-item"><a href="#">Ракетки</a></li>--}}
{{--             <li class="breadcrumb-item"><a href="#">Кошик</a></li>--}}
{{--            <li class="breadcrumb-item active" aria-current="page">Новини</li>--}}
{{--        </ol>--}}
{{--    </nav>--}}
    {!! Breadcrumbs::render($name,isset($value)?$value:null) !!}

</div>



@section('breadcrumbs')
    <div class="container   ">
        {!! Breadcrumbs::render($name,isset($value)?$value:null) !!}
    </div>
@stop
@push("head")
    {{ Breadcrumbs::view('breadcrumbs::json-ld',$name,isset($value)?$value:null) }}
@endpush
