<tr>
     <td>
        @if($product->logo != null)
            <div class="thumbnail  thumbnail-admin-image"
                 style="margin-bottom: 0;width: 40px;">
                <a href="{{$product->big_logo}}" data-lightbox="{{$product->id}}">
                    <img src="{{ $product->logo }}"
                         style="width: 40px;height: auto;">
                </a>
            </div>
        @endif
    </td>
    <td style="max-width:200px">
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

            {{$product->quantity}}

    </td>
    @foreach($product->prices as $productPrice)
        <td>
            {{$productPrice->price}} {{$productPrice->currency->code}}
        </td>
        <td>
            {{$productPrice->total_price}} {{$productPrice->currency->code}}
        </td>
    @endforeach
</tr>
