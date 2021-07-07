<div class="container-fluid  landing-page-item  landing-page-image  landing-page-item-{{$item->id}}   {{$item->classes}}">
    <div class="row">
        <div class="col-12 p-0">
            <img src="{{$item->value}}" alt="" style="width: 100%;height: auto ">
        </div>
    </div>
    
</div>

@include('frontend.landing_pages.items.parts.common')