@extends('layouts.backend')


@section("sub_title") - Відгуки кліентів  @endsection

@section('content')

        <div class="card">
            <div class="card-header">
                Відгуки
            </div>
            <div class="card-body">
                <div class="header-admin-button">
                    {!! Form::open(['method' => 'GET', 'url' => route("admin.products-reviews.index"), 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
{{--                    <div class="form-group">--}}
{{--                    <select id="reviews_search_products" name="reviews_search_products[]" multiple="multiple"--}}
{{--                            style="width: 100%;">--}}
{{--                     </select>--}}
{{--                        </div>--}}


                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{Request::get('search')}}"  placeholder="Пошук...">
                        <span class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                @include("admin.global.message_block")

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>ID</th>
                            <th>Імя Кліента</th>
                            <th width="300">Товар</th>
                            <th>Email</th>
{{--                            <th>Опис</th>--}}
                            <th>Ip</th>
                            <th>Дата</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products_reviews as $item)
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label><input class="reviews_checkbox"  type="checkbox" value="{{$item->id}}"></label>
                                    </div>
                                </td>
                                <td>
                                    @if($item->revised == true)
                                        <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                                    @else
                                        <i class="glyphicon glyphicon-eye-close" aria-hidden="true"></i>

                                    @endif
                                    @if($item->answer != null)
                                        <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                    @endif


                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user_name }}</td>
                                <td>
                                    @if($item->product!=null)
                                       <a href="{{ $item->product->front->url}}"> {{ $item->product->name }}</a>
                                    @endif

                                </td>
                                <td>{{ $item->email }}</td>
{{--                                <td>--}}
{{--                                    <a class="display-colorbox-text" href="#description-id-{{$item->id}}">Опис</a>--}}
{{--                                    <div style="display: none">--}}
{{--                                    <div id="description-id-{{$item->id}}" style="word-wrap: break-word;">--}}
{{--                                    {{$item->description }}--}}
{{--                                    </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
                                <td>{{ $item->ip }}</td>
                                <td>{{ $item->date_of_sending }}</td>
                                <td>

                                    <a href="{{route("admin.products-reviews.show",["id"=>$item->id])}}" title="Перегляд">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route("admin.products-reviews.edit",["id"=>$item->id]) }}" title="Редагувати">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">
                                            </i></button></a>

                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route("admin.products-reviews.delete",["id"=>$item->id]),

                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Видалити відгук',
                                            'onclick'=>'return confirm("Підтвердити видалення?")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $products_reviews->appends(['search' => Request::get('search'),'reviews_search_products' => Request::get('reviews_search_products')])->render() !!} </div>
                    <div class=" admin_action_wrapper">



                        {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => route("admin.products-reviews.delete_mass"),

                                       'style' => 'display:inline'
                                   ]) !!}

                        <div style="display: none" class="reviews-hidden-wrapper"></div>
                        {!! Form::button(' Видалити позначені', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Видалити позначені',
                                'onclick'=>'return confirm("Підтвердити видалення?")'
                        )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

    </div>
@endsection

@push("scripts")
    <script>
        $(document).ready(function () {
            $(".reviews_checkbox").change(function () {
                var $array_ids = [];
                $(".reviews-hidden-wrapper").html("");
                $(".reviews_checkbox:checked").each(function (index,element) {
                    var $hidden = '<input type="hidden" name="elements[]" value="'+$(this).val()+'"> ';
                    $(".reviews-hidden-wrapper").append($hidden);
                } );
            });
            $(".display-colorbox-text").colorbox({inline: true, width: "50%"});
        })
    </script>
@endpush





@push("scripts")
     <script>
        $(document).ready(function() {
            $('#reviews_search_products').select2(
                {
                    minimumInputLength: 3,
                    language: "ru",
                    // data:data,
                    ajax: {
                        method:"GET",
                        url: '{{route("admin.products.search-json")}}',
                        dataType: 'json',
                        processResults: function (data) {
                            // Tranforms the top-level key of the response object from 'items' to 'results'
                            console.log(777,data);
                            let result = [];
                            for (let  i = 0 ; i < data.length; i++)
                            {
                                let obj = data[i];
                                result.push({id:obj.id,text:obj.name + " - "+obj.vendor_code});
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
