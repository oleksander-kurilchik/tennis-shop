<a href="{{  route("admin.categories.show",["id"=>$item->id])}}" title="Перегляд">
    <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                           aria-hidden="true"></i>
    </button>
</a>
<a href="{{route("admin.categories.edit",["id"=>$item->id]) }}"
   title="Редагувати">
    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                 aria-hidden="true"></span>
    </button>
</a>
@if(!$item->canDelete())

    {!! Form::open([
        'method'=>'DELETE',
        'url' => route("admin.categories.delete",["id"=>$item->id]),
        'style' => 'display:inline'
    ]) !!}
    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-sm',
            'title' => 'Видалити',
            'onclick'=>'return confirm("Підтвердження видалення?")'
    )) !!}
    {!! Form::close() !!}
@endif




{{--{!! Form::open([--}}
       {{--'method'=>'POST',--}}
       {{--'url' => route("admin.categories.flush",["id"=>$item->id]),--}}
       {{--'style' => 'display:inline'--}}
   {{--]) !!}--}}
{{--{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true">Очищити</i> ', array(--}}
        {{--'type' => 'submit',--}}
        {{--'class' => 'btn btn-danger btn-xs',--}}
        {{--'title' => 'Очищити',--}}
        {{--'onclick'=>'return confirm("Підтвердження очищення?")'--}}
{{--)) !!}--}}
{{--{!! Form::close() !!}--}}
