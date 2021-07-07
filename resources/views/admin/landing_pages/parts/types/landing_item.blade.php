@php ($bag = $errors->getBag('landing_page_item_errors_'.$item->id))
@php ($old_prefix = "landing_page_item_old_".$item->id)

<div class="card my-4  border border-dark">
    <div class="card-header bg-dark">
<div class="d-flex justify-content-between align-items-center">
        <button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#landing_page_item_{{$item->id}}"
                aria-expanded="false" aria-controls="collapseOne">
            {{$item->admin_name}}
        </button>
         {!! Form::open([
            'method'=>'DELETE',
            'url' => route("admin.landing_pages_items.delete",["id"=>$item->id]),
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-sm',
                'title' => 'Видалити',
                'onclick'=>'return confirm("Підтвердження видалення?")'
        )) !!}
        {!! Form::close() !!}
        </div>
    </div>
    <div id="landing_page_item_{{$item->id}}" class="collapse" aria-labelledby="headingTwo">
        <div class="card-body">
            {!! Form::model($item, [
                           'method' => 'PATCH',
                           'url' => route("admin.landing_pages_items.update",["id"=>$item->id]),
                           'class' => 'form-horizontal form-admin',
                           'files' => true
                       ]) !!}
            <div class="form-group pb-4 {{ $bag->has('name') ? 'has-error' : ''}}  ">
                {!! Form::label('name', 'Назва', ['class' => ' ']) !!}
                <div class="w-100">
                    {!! Form::text('name', old($old_prefix.".name"), ['class' => 'form-control','autocomplete'=>'off'  ]) !!}
                    {!! $bag->first('name', ' <p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
            @switch($item->type)
                @case('ckeditor')
                @include('admin.landing_pages.parts.types.ckeditor',['item'=>$item])
                @break
                @case('ckeditor_w100')
                @include('admin.landing_pages.parts.types.ckeditor_w100',['item'=>$item])
                @break
                @case('image')
                @include('admin.landing_pages.parts.types.image',['item'=>$item])
                @break
                @case('parallax_json')
                @include('admin.landing_pages.parts.types.parallax_json',['item'=>$item])
                @break
                @case('slider_json')
                @include('admin.landing_pages.parts.types.slider_json',['item'=>$item])
                @break
                @case('raw_html')
                @include('admin.landing_pages.parts.types.raw_html',['item'=>$item])
                @break
                @case('youtube')
                @include('admin.landing_pages.parts.types.youtube',['item'=>$item])
                @break
                @default
                @include('admin.landing_pages.parts.types.raw_html',['item'=>$item])
                @break
            @endswitch
            @include('admin.landing_pages.parts.types.common')

            {!! Form::close() !!}

        </div>
    </div>
</div>
