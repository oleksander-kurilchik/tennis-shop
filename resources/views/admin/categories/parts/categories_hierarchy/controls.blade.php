<div class="dd-handle__controls " >
    <a href="{{  route('admin.categories.show',[  'id'=>$item->id])}}" title="Перегляд">
        <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                               aria-hidden="true"></i>
        </button>
    </a>
    <a class="d-inline-block ml-2" href="{{route('admin.categories.edit',[  'id'=>$item->id]) }}"
       title="Редагувати">
        <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                     aria-hidden="true"></span>
        </button>
    </a>


</div>
