<div id="tab_translates" role="tabpanel" class="tab-pane fade pt-4">
    <div class=" card admin-form-card" style="">
        <div class="card-header admin-form-card__header">Список перекладів</div>
        <div class="card-body admin-form-card__body">
            <ul class="nav nav-tabs" role="tablist">
                @foreach($landing_page->translating as $trans_item)
                    <li role="presentation" class=" nav-item "><a
                                class="nav-link @if ($loop->first) active @endif"
                                aria-controls="tr_tab_{!! $loop->index !!}"
                                href="#tr_tab_{!! $loop->index !!}" data-toggle="tab" role="tab"
                                aria-controls="tr_tab_{!!$loop->index!!}"
                                aria-selected="{{$loop->first?"true":"false"}}">
                            {!! $trans_item->language->name !!}
                        </a></li>
                @endforeach
            </ul>
            <div class="tab-content pt-4">
                @forelse($landing_page->translating as $trans_item)
                    <div role="tabpanel"
                         class="tab-pane fade @if ($loop->index==0) show active @endif"
                         id="tr_tab_{!!$loop->index!!}">
                        @include("admin.landing_pages.form_translating",["translating"=>$trans_item])
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

</div>