<div class="order-products">
    <h2>Товари</h2>
    <div class="table-responsive">
        <table class="table table-striped" style="font-size: 14px">
            <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th>Продукт</th>
                <th>Артикул</th>
                <th>Кількість</th>
                @foreach($order->prices as $oderPrice)
                    <th>Ціна</th>
                    <th>Загальна ціна</th>
                @endforeach
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        @if($product->product != null && $product->product->logo)
                            <div class="thumbnail  thumbnail-admin-image"
                                 style="margin-bottom: 0;width: 40px;">
                                <a href="{{$product->product->logo->big_path}}" data-lightbox="{{$product->id}}">
                                    <img src="{{ $product->product->logo->small_path }}"
                                         style="width: 40px;height: auto;">
                                </a>
                            </div>
                        @endif
                    </td>
                    <td>
                        @if($product->url)
                            <a href="{{$product->url}}">{{$product->product_name}}</a>
                        @else
                            {{$product->product_name}}
                        @endif
                    </td>
                    <td>
                        {{$product->vendor_code}}
                    </td>
                    <td>
                        @if($order->canEdit())

                            <div class="sorting-field-wrap">
                                {!! Form::open([
                               'method' => 'POST',
                               'url' => route("admin.orders_products.change-qty",["id"=>$product->id]) ,
                               'style' => 'display:inline',

                           ]) !!}
                                {!! Form::number('quantity', $product->quantity, ['class' => 'form-control sorting-input','onchange'=>"form.submit()"]) !!}
                                {!! Form::close() !!}
                            </div>
                        @else
                            {{$product->quantity}}
                        @endif
                    </td>
                    @foreach($product->prices as $productPrice)
                        <td>
                            {{$productPrice->price}} {{$productPrice->currency->code}}
                        </td>
                        <td>
                            {{$productPrice->total_price}} {{$productPrice->currency->code}}
                        </td>
                    @endforeach
                    <td>
                        @if($order->canEdit())
                            {!! Form::open([
                                     'method'=>'DELETE',
                                     'url' => route("admin.orders_products.delete",["id"=>$product->id]),
                                     'style' => 'display:inline'
                                 ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Видалити продукт',
                                    'onclick'=>'return confirm("Підтвердити видалення?")'
                            )) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @if($product->description!=null)
                    <tr>
                        <td colspan="6" style="border: none">
                            {!! $product->description !!}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    @include('admin.orders.parts.edit.add_product_form')

    <hr>
</div>
