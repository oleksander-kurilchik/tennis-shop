@php
    $items = $landing_page->items()->where("languages_id",$language->id)->get();
@endphp
@foreach($items as $item)
    @include('admin.landing_pages.parts.types.landing_item',['item'=>$item])
@endforeach
<div class="card my-4  admin-form-card">
    <div class="card-header admin-form-card__header">Додати новий блок
    </div>
    <div class="card-body admin-form-card__body">
        {!! Form::open(['url' => route("admin.landing_pages_items.store"), 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group {{ $errors->has('published') ? 'has-error' : ''}} ">
            {!! Form::label('type', 'Тип блока', ['class' => ' ']) !!}
            <div class="w-100 form-check form-check-inline  flex-wrap">
                {!!  Form::select('type', [
                'ckeditor' => 'Ckeditor',
                'ckeditor_w100' => 'Ckeditor 100% ширина',
                'parallax_json' => 'Паралакс',
                'image' => 'Зображення',
                'raw_html' => 'Raw Html',
                'slider_json' => 'Слайдер',
                'youtube' => 'Youtube',
                 ],null,['class' => 'form-control']) !!}
                {!! $errors->first('type', ' <p class="invalid-feedback d-block w-100">:message</p>') !!}
            </div>
        </div>

        <div class="form-group pb-4 {{ $errors->has('name') ? 'has-error' : ''}}  ">
            {!! Form::label('name', 'Назва блока', ['class' => ' ']) !!}
            <div class="w-100">
                {!! Form::text('name', null, ['class' => 'form-control'  ]) !!}
                {!! $errors->first('name', ' <p class="invalid-feedback d-block">:message</p>') !!}
            </div>
        </div>


        {!! Form::hidden('languages_id',$language->id) !!}
        {!! Form::hidden('landing_pages_id',$landing_page->id) !!}
        <div class="form-group">
            <div class=" w-100 text-center ">
                {!! Form::submit('Створити', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    </div>


    {!! Form::close() !!}

</div>

