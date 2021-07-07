<div class="form-products-wrapper">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required' , 'autocomplete'=>'off']) !!}
            {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    @foreach($languages as $language)
        <div class="form-group {{ $errors->has('title.'.$language->value) ? 'has-error' : ''}}">
            {!! Form::label('', 'Заголовок - '. $language->name  , ['class' => ' control-label']) !!}
            <div class="">
                {!! Form::text("title[{$language->value}]", old("name[{$language->value}]",(isset($item)?$item->getTranslation('title',$language->value,false):'')), ['class' => 'form-control', 'required' => 'required' , 'autocomplete'=>'off']) !!}
                {!! $errors->first("title[{$language->value}]", '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
        </div>
    @endforeach

{{--    <input type="hidden" name="group_id"  value="{{$group->id}}">--}}



    <div class="form-group {{ $errors->has('products_id') ? 'has-error' : ''}}">
        {!! Form::label('products_id', 'Товар', ['class' => ' control-label']) !!}
        <div class="">
            <select id="product_select" name="products_id"  class="form-control "  autocomplete="off" style="width: 100%"  >
                {{--        @foreach($product->additional_products_obj as $item)--}}
                {{--            <option value="{{$item->id}}" selected>{{$item->name . " - ". $item->vendor_code}}</option>--}}
                {{--        @endforeach--}}
                @if(isset($selectedProduct))

                                <option value="{{$selectedProduct->id}}" selected>{{$selectedProduct->name . " - ". $selectedProduct->vendor_code}}</option>

                @endif
            </select>


            {!! $errors->first('products_id', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>





    <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
        {!! Form::label('order', 'Сортування', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::number('order', old('order',isset($item)?$item->order:0), ['class' => 'form-control', 'autocomplete'=>'off', 'required' => 'required']) !!}
            {!! $errors->first('order', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class="w-100 text-center" >
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

@push("scripts")
    <script>
        $(document).ready(function () {
            $('#product_select').select2(
                {
                    minimumInputLength: 3,

                    language: "ru",
                    // data:data,
                    ajax: {
                        method: "GET",
                        url: '{{route("admin.products.search-json")}}',
                        dataType: 'json',
                        processResults: function (data) {
                            var result = [];
                            for (var i = 0; i < data.length; i++) {
                                var obj = data[i];
                                result.push({id: obj.id, text: obj.name + " - " + obj.vendor_code});
                            }
                            return {
                                results: result
                            };
                        },
                        data: function (params) {
                            console.log(params);
                            var query = {
                                search: params.term
                            };
                            return query;
                        }
                    },

                }
            );
        });
    </script>
@endpush
