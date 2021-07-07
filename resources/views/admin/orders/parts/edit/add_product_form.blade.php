@if($order->canEdit())
    <div class="add-new-product">

        <div class="card">
            <div class="card-header">Додати товар до замовлення</div>
            <div class="card-body">

                @if ($errors->getBag('additional_products')->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->getBag('additional_products')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::open(['method' => 'POST', 'url' =>  route("admin.orders_products.add") , 'class' => 'navbar-form'])  !!}
                <div style="width: 100%;"
                     class="form-group {{ $errors->getBag('orders_products_add')->has('orders_product') ? 'has-error' : ''}}">
                    <select id="orders_product_add_select" name="orders_product_add"
                            style="width: 100%;">
                    </select>
                    <input type="hidden" name="orders_id" value="{{$order->id}}">
                </div>
                {!! Form::submit('Додати', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif


@push("scripts")
    <script>
        $(document).ready(function () {
            $('#orders_product_add_select').select2(
                {
                    minimumInputLength: 3,
                    language: "ru",
                    // data:data,
                    ajax: {
                        method: "GET",
                        url: '{{route("admin.products.search-json")}}',
                        dataType: 'json',
                        processResults: function (data) {
                            // Tranforms the top-level key of the response object from 'items' to 'results'
                            console.log(777, data);
                            let result = [];
                            for (let i = 0; i < data.length; i++) {
                                let obj = data[i];
                                result.push({
                                    id: obj.id,
                                    text: "#id:" + obj.id + "-" + obj.name + " - " + obj.vendor_code + ";"
                                });
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
