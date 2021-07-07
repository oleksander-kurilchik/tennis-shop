@if(Auth::guard('backend')->check())
    <div class="" style="position: fixed;z-index: 100;left: 10px;top:50px">

                <a class="btn btn-warning" href="{{route("admin.landing_pages.edit",["id"=>$page->id])}}">
                    Редагувати лендинг </a>

    </div>
@endif