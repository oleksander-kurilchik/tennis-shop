{{--<a href="{{  route("admin.menus.show",["id"=>$item->id])}}" title="Перегляд">--}}
{{--    <button class="btn btn-info btn-sm"><i class="fa fa-eye"--}}
{{--                                           aria-hidden="true"></i>--}}
{{--    </button>--}}
{{--</a>--}}
<a href="{{route("admin.menus.edit",["id"=>$item->id]) }}"
   title="Редагувати">
    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                 aria-hidden="true"></span>
    </button>
</a>
{{--@if($item->isEmpty())--}}
    {!! Form::open([
        'method'=>'DELETE',
        'url' => route("admin.menus.delete",["id"=>$item->id]),
        'style' => 'display:inline'
    ]) !!}
    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-sm',
            'title' => 'Видалити',
            'onclick'=>'return confirm("Підтвердження видалення?")'
    )) !!}
    {!! Form::close() !!}
{{--@endif--}}

