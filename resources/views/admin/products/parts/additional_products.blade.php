<div id="tab_additional_products" class="tab-pane fade">
    <div class="card">
        <div class="card-header">Схожі товари </div>
        <div class="card-body">
        @include("admin.global.message_block")
            @if ($errors->getBag('additional_products')->any())
                <div>
                    <ul class="alert alert-danger">
                        @foreach ($errors->getBag('additional_products')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['method' => 'POST', 'url' =>  route("admin.products.additional-products.update",["id"=>$product->id]) , 'class' => 'form-horizontal'])  !!}
                <div style="width: 100%;"
                     class="form-group {{ $errors->getBag('additional_products')->has('product_additional') ? 'has-error' : ''}}">
                    <select id="product_additional_select" name="product_additional[]"
                            multiple="multiple" class="form-control "  autocomplete="off" style="width: 100%"  >
                        @foreach($product->additional_products_obj as $item)
                            <option value="{{$item->id}}" selected>{{$item->name . " - ". $item->vendor_code}}</option>
                        @endforeach
                    </select>
                </div>
                {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>

</div>

@push("scripts")
    <script>
        $(document).ready(function () {
            $('#product_additional_select').select2(
                {
                    minimumInputLength: 3,
                    maximumSelectionLength: 6,
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
