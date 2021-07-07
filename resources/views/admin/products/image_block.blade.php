<div id="tab_block_images" class="tab-pane fade">
    <div class="image-block-form pt-4">
        <div class=" card">
            <div class="card-header">Зображення</div>
            <div class="card-body">
                @if ($errors->getBag('product_images')->any())
                    <div class="col-xs-12">
                        <ul class="alert alert-danger">
                            @foreach ($errors->getBag('product_images')->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-load-image">
                    <div class="   text-center pt-2 pb-2"> Завантажити зображення</div>
                    {!! Form::open(['url' => route ('admin.products.image.store'), 'class' => 'form-horizontal', 'files' => true]) !!}
                    <div class="form-in-wrap">
                        <div class="image-load-form text-center pt-4  pb-4">
                            {!! Form::file('images[]', ['class' => 'form-control', 'multiple'=>'multiple']) !!}
                            {!! $errors->getBag("product_images")->first('image', '<p class="invalid-feedback d-block">:message</p>') !!}
                        </div>
                        {!! Form::hidden('products_id',$product->id) !!}
                        <div class="image-button-submit pt-2 pb-2 text-center ">
                            <div class="text-center" style="width: 100%">
                                {!! Form::submit( 'Завантажити зображення', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <hr class="pt-2 pb-2">


                @if ($product->images->count()>0)
                    <div class="product-image-sortable-wrap">
                        @foreach($product->images as $image_item)
                            <div class="row justify-content-between">
                                <div class="col-auto  ">
                                    @include("admin.products.image_size_button",["image_item"=>$image_item])
                                </div>
                                <div class="images-operation-images col-auto d-flex justify-content-center flex-column">
                                    <div class="order-field-wrap">
                                        {!! Form::open([
                                       'method' => 'POST',
                                       'url' => route("admin.products.image.order",["id"=>$image_item->id]),
                                       'class' => 'display: pb-4',

                                   ]) !!}
                                        {!! Form::number('order', $image_item->order, ['class' => 'form-control order-input','onchange'=>"form.submit()"]) !!}
                                        {!! Form::close() !!}
                                    </div>


                                    <div class="logo-radio-wrapper pb-4">
                                        {!! Form::open([
                                             'method'=>'POST',
                                             'url' =>  route("admin.products.image.set-logo",["id"=> $image_item->id]),
                                             'style' => 'display:inline'
                                         ]) !!}

                                        <div class="input-group radio radio-primary d-flex ">
                                            <label for="" class="pr-3 mb-0">Зробити як лого</label>
                                            <input type="radio" name="category_image_id" value="{{$image_item->id}}"
                                                   @if($image_item->logo_status) checked
                                                   @endif onChange="this.form.submit();">

                                        </div>

                                        {!! Form::close() !!}
                                    </div>
                                    <div class="delete-button-wrapper">

                                        {!! Form::open([
                                           'method'=>'DELETE',
                                           'url' => route ('admin.products.image.delete',["id" => $image_item->id]),
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
                        @endforeach
                    </div>

                @else
                    <div class="no-found-images">
                        Зображень не знайдено
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


