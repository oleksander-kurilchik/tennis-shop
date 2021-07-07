<div id="items_tab_block" role="tabpanel" class="tab-pane fade pt-4">
    <div class=" card admin-form-card" style="">
        <div class="card-header admin-form-card__header">Список перекладів</div>
        <div class="card-body admin-form-card__body">
            <ul class="nav nav-tabs" role="tablist">
                    @foreach($languages as $language)
                        <li role="presentation" class=" nav-item ">
                            <a
                                    class="nav-link @if ($loop->first) active @endif"
                                    aria-controls="tr_tab_items{!! $loop->index !!}"
                                    href="#tr_tab_items{!! $loop->index !!}" data-toggle="tab" role="tab"
                                    aria-controls="tr_tab_items{!!$loop->index!!}"
                                    aria-selected="{{$loop->first?"true":"false"}}">
                                {!! $language->name !!}
                            </a>
                        </li>
                    @endforeach




            </ul>
            <div class="tab-content pt-4">

                @foreach($languages as $language)

                    <div role="tabpanel"
                         class="tab-pane fade @if ($loop->index==0) show active @endif"
                         id="tr_tab_items{!!$loop->index!!}">
                        @include("admin.landing_pages.parts.items_group",['language'=>$language,'landing_page'=>$landing_page])

                    </div>

                @endforeach
            </div>
        </div>
    </div>

</div>