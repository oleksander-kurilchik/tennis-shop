<div class="image-block-form pt-4">
    <div class=" card">
        <div class="card-header">Зображення</div>
        <div class="card-body ">
            <div class="form-load-image">
                <div class="   text-center pt-2 pb-2"> Завантажити зображення</div>
                {!! Form::open(['url' =>  route("admin.categories.image.store"), 'class' => 'form-horizontal  form-admin', 'files' => true]) !!}
                <div class="form-in-wrap">
                    <div class="image-load-form text-center pt-4  pb-4">
                        {!! Form::file('images[]',   ['class' => 'form-control pt-2 pb-2 h-auto' , "multiple"=>"multiple"]) !!}
                        {!! $errors->first('file', '<p class="invalid-feedback d-block">:message</p>') !!}
                    </div>
                    {!! Form::hidden('categories_id',$category->id) !!}
                    <div class="image-button-submit pt-2 pb-2 text-center ">
                        {!! Form::submit( 'Завантажити зображення', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <hr class="pt-2 pb-2">
            @forelse($category->images as $image_item)
                <div class="row justify-content-between">
                    <div class="col-auto  ">
                        @include("admin.global.image_size_button",["image_item"=>$image_item])
                    </div>
                    <div class="images-operation-images col-auto d-flex flex-column justify-content-center">
                        <div class="logo-radio-wrapper pb-4">
                            {!! Form::open([
                                 'method'=>'POST',
                                 'url' => route("admin.categories.image.set-logo",["id"=>$image_item->id]),
                                 'style' => 'display:inline'
                             ]) !!}

                            <div class="input-group radio radio-primary d-flex ">
                                <label for="" class="pr-3 mb-0">Зробити як лого</label>
                                <input type="radio" name="category_image_id" value="{{$image_item->id}}"
                                       @if($image_item->logo_status) checked @endif onChange="this.form.submit();">

                            </div>

                            {!! Form::close() !!}
                        </div>
                        <div class="delete-button-wrapper">

                            {!! Form::open([
                               'method'=>'DELETE',
                               'url' =>  route("admin.categories.image.delete",["id"=>$image_item->id]),
                               'style' => 'display:inline'
                           ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Видалити', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete CategoriesImage',
                                    'onclick'=>'return confirm("Підтвердити видалення?")'
                            )) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-found-images">
                    Зображень не знайдено
                </div>
            @endforelse
        </div>
    </div>
</div>


