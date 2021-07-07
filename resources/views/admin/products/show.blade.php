@extends('layouts.backend')

@section("sub_title") - Товари  @endsection
@section('content')

        <div class="card">
            <div class="card-header">Товар {{ $product->id }} - {{$product->name}}</div>
            <div class="card-body">

                <a href="{{ route("admin.products.index")}}" title="Назад">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </a>
                <a href="{{route("admin.products.edit",["id"=>$product->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.products.delete",["id"=>$product->id]),
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Видалити товар',
                        'onclick'=>'return confirm("Підтвердити видалення?")'
                ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th> Назва</th>
                            <td> {{ $product->name }} </td>
                        </tr>
                        <tr>
                            <th> Аттикул</th>
                            <td> {{ $product->vendor_code }} </td>
                        </tr>
                        <tr>
                            <th> Сортування</th>
                            <td> {{ $product->order }} </td>
                        </tr>
                        <tr>
                            <th> Посилання</th>
                            <td> {{ $product->slug }} </td>
                        </tr>

                        <tr>
                            <th> Кількість</th>
                            <td> {{ $product->quantity }} </td>
                        </tr>


                        <tr>
                            <th> Опубліковано</th>
                            <td> {{ $product->published==true?"Так" :"Ні" }} </td>
                        </tr>
                        <tr>
                            <th> Дата публікації</th>
                            <td> {{ $product->date_publication}} </td>
                        </tr>

                        <tr>
                            <th> Ціна</th>
                            <td> {{ $product->price }} </td>
                        </tr>
                        <tr>
                            <th> Валюта</th>
                            <td> {{ $product->currency->name }} </td>
                        </tr>
                        <tr>
                            <th> Стара ціна</th>
                            <td> {{ $product->old_price }} </td>
                        </tr>
                        <tr>
                            <th> Розпродаж</th>
                            <td> {{ $product->sale==true ? "Так" : "Ні" }} </td>
                        </tr>
                          <tr>
                            <th> Новинка</th>
                            <td> {{ $product->new==true ? "Так" : "Ні" }} </td>
                        </tr>
                          <tr>
                            <th> Топ</th>
                            <td> {{ $product->top==true ? "Так" : "Ні" }} </td>
                        </tr>
                          <tr>
                            <th> На складі</th>
                            <td> {{ $product->in_stock==true ? "Так" : "Ні" }} </td>
                        </tr>
                          <tr>
                            <th> Не доступно</th>
                            <td> {{ $product->not_available==true ? "Так" : "Ні" }} </td>
                        </tr>

                        <tr>
                            <th> Категория</th>
                            <td> {{ $product->category->getLevelName() }} </td>
                        </tr> <tr>
                            <th> Під замовлення</th>
                            <td> {{ $product->under_the_order == true? "Так" : "Ні" }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <div class="language-tabs-wrapper pb-4">
                    <div class="t-header">Список перекладів</div>
                    <ul class="nav nav-tabs" role="tablist">
                        @forelse($product->translating as $trans_item)
                            <li role="presentation" class=" nav-item">
                                <a class="nav-link @if ($loop->first) active @endif"
                                        aria-controls="tr_tab_{!! $loop->index !!}"
                                        href="#tr_tab_{!! $loop->index !!}" role="tab" data-toggle="tab">
                                    {!! $trans_item->language->name !!}
                                </a></li>
                        @empty
                        @endforelse
                    </ul>
                    <div class="tab-content">
                        @forelse($product->translating as $trans_item)
                            <div role="tabpanel" class="tab-pane fade pt-4 @if ($loop->index==0) show active @endif"
                                 id="tr_tab_{!!$loop->index!!}">
                                <div class=" translating_item_wrapper">
                                    <dl class="dl-horizontal">
                                        <dt>Заголовок</dt>
                                        <dd>{!!$trans_item->title!!}</dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt>Опис</dt>
                                        <dd>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    {!!$trans_item->description!!}
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Короткий опис</dt>
                                        <dd>{!!$trans_item->short_description!!}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Seo Title</dt>
                                        <dd>{!!$trans_item->seo_title!!}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Seo Keywords</dt>
                                        <dd>{!!$trans_item->seo_keywords!!}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Seo Description</dt>
                                        <dd>{!!$trans_item->seo_description!!}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Seo Text</dt>
                                        <dd>{!!$trans_item->seo_text!!}</dd>
                                    </dl>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    @include("admin.products.image_block_simple",["images"=>$product->images])
                </div>
            </div>
        </div>
@endsection
