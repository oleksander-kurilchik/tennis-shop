<ol class="dd-list dd-list__default">
    @foreach($items as $item)
        <li class="dd-item dd-item__default" data-id="{{$item->id}}">
{{--            <div class="right dd-options">--}}
{{--                <a class="pointer white-text margin-r10 modal_1500296184866-struct-edit" data-id="1" title="Bearbeiten">--}}
{{--                    <i class="fa fa-pencil" aria-hidden="true"></i>--}}
{{--                </a>--}}
{{--                <a class="pointer white-text modal_1500296184866-struct-delete" data-id="1" title="Löschen">--}}
{{--                    <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="pull-right item_actions">
                <div class="dd-handle__controls">
                    @include('admin.menus.menu_item.parts.item_controls',['item'=>$item])
                </div>
            </div>

            <div class="dd-handle dd-handle__default">
                <div class="dd-handle__title d-inline-block">{{$item->id}} - {{$item->name}}</div>
{{--                <div class="dd-handle__controls d-inline-block">--}}
{{--
{{--                </div>--}}
            </div>
            @if($item->childrens->isNotEmpty())
                @include('admin.menus.menu_item.parts.items_list',['items'=>$item->childrens])
            @endif
        </li>
    @endforeach
</ol>


