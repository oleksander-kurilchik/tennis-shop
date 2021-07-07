<div class="p-product__product-descriptions-tabs">
    <div class="p-product__description-tab-list-wrap">
        <div class="p-product__description-tab-list-container container">
            <ul class="nav b-list-default p-product__description-tab-list" id="myTab" role="tablist">
                <li class="  b-list-default__item" role="presentation">
                    <a class=" b-list-default__link active" id="product-description-tab" data-toggle="tab"
                       href="#product-description-tabpanel" role="tab" aria-controls="product-description-tabpanel"
                       aria-selected="true">
                        @lang('product.tabs.description')
                    </a>
                </li>
                <li class="  b-list-default__item" role="presentation">
                    <a class=" b-list-default__link" id="product-properties-tab" data-toggle="tab"
                       href="#product-properties-tabpanel" role="tab" aria-controls="product-properties-tabpanel"
                       aria-selected="false">
                        @lang('product.tabs.attributes')
                    </a>
                </li>
                <li class=" b-list-default__item" role="presentation">
                    <a class=" b-list-default__link" id="product-reviews-tab" data-toggle="tab"
                       href="#product-reviews-tabpanel"
                       role="tab" aria-controls="product-reviews-tabpanel" aria-selected="false">
                        @lang('product.tabs.reviews') (<span class="js-product-reviews-tabpanel__count">0</span>)
                    </a>
                </li>
                <li class=" b-list-default__item" role="presentation">
                    <a class=" b-list-default__link" id="product-delivery-and-payment-tab" data-toggle="tab"
                       href="#product-delivery-and-payment-tabpanel" role="tab"
                       aria-controls="product-delivery-and-payment-tabpanel"
                       aria-selected="false">
                        @lang('product.tabs.delivery_payment')
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="p-product__description-tab-content">
        <div class="p-product__description-tab-content-container container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active  p-product__tabpanel p-product__description-tabpanel "
                     id="product-description-tabpanel"
                     role="tabpanel"
                     aria-labelledby="product-description-tab">
                    <div class="p-product__description-tabpanel-content p-product__tabpanel-content">
                        {!! $product->trans->description !!}
                    </div>

                </div>
                <div class="tab-pane fade p-product__tabpanel" id="product-properties-tabpanel" role="tabpanel"
                     aria-labelledby="product-properties-tab">
                    <div class="p-product__tabpanel-content">
                        <div class="p-product__property-list">
                            @foreach($product->attributes as $attribute)
                                <div class="p-product__property-item">
                                    <div class="p-product__property-item-title">{{$attribute->getTranslation('attribute_title',  app()->getLocale())}}</div>
                                    <div class="p-product__property-item-value">{{$attribute->getTranslation('value_text', app()->getLocale())}}</div>
                                </div>

                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-product__tabpanel " id="product-reviews-tabpanel" role="tabpanel"
                     aria-labelledby="product-reviews-tab">
                    <div class="p-product__tabpanel-content">

                        @include('frontend.products.parts.show._product_revievs')

                    </div>
                </div>
                <div class="tab-pane fade p-product__tabpanel" id="product-delivery-and-payment-tabpanel"
                     role="tabpanel"
                     aria-labelledby="product-delivery-and-payment-tab">
                    <div class="p-product__tabpanel-content">
                        {!! config('site.product.payment_and_delivery') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
