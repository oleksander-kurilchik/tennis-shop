<ol class="dd-list dd-list__default">
    @foreach($items as $item)
        <li class="dd-item dd-item__default" data-id="{{$item->id}}">

<div class="">
            <div class="pull-right item_actions">
                @include('admin.categories.parts.categories_hierarchy.controls')
            </div>
            <div class="dd-handle dd-handle__default">
                <div class="dd-handle__title d-inline-block">{{$item->id}} - {{$item->name}}</div>
{{--                <div class="dd-handle__controls d-inline-block">--}}
{{--                    @include('admin.categories.parts.categories_hierarchy.controls')--}}
{{--                </div>--}}
            </div>
            </div>


            @if($item->childrens->isNotEmpty())
                @include('admin.categories.parts.categories_hierarchy.items_list',['items'=>$item->childrens->sortBy('order')])
            @endif
        </li>
    @endforeach
</ol>


