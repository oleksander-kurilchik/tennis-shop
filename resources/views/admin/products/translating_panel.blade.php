<div id="tab_translates" class="tab-pane fade">
    <div class="language-tabs-wrapper" style="">
        <div class="t-header">Список перекладів</div>
        <ul class="nav nav-tabs" role="tablist">
            @foreach($product->translating as $trans_item)
                <li role="presentation" class="nav-item">
                    <a class="nav-link @if ($loop->first) active @endif"
                            aria-controls="tr_tab_{!! $loop->index !!}"
                            href="#tr_tab_{!! $loop->index !!}" role="tab" data-toggle="tab">
                        {!! $trans_item->language->name !!}
                    </a></li>
            @endforeach
        </ul>
        <div class="tab-content pt-4">
            @forelse($product->translating as $trans_item)
                <div role="tabpanel"
                     class="tab-pane fade @if ($loop->index==0) show active @endif"
                     id="tr_tab_{!!$loop->index!!}">
                    @include("admin.products.form_translating",["translating"=>$trans_item])
                </div>
            @empty
            @endforelse
        </div>
    </div>

</div>