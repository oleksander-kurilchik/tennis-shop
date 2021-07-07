@extends('layouts.backend')


@section('content')
    <div id="product-content">
        <div class="card">
            <div class="card-header">Редагувати товар #{{ $product->id }} - {{$product->name}} </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.products.index") }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                        </button>
                    </a>
                    {!! Form::open([
                                           'method'=>'POST',
                                           'url' => route("admin.products.image.rebuild",["products_id"=>$product->id]),
                                           'class' => 'form-horizontal d-inline-block',
                                       ]) !!}
                    {!! Form::button('<i class="fa fa-image" aria-hidden="true"></i> Оновити зображення' , array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => ' ',
                            'onclick'=>'return confirm("Підтвердити оновлення? Увага нагрузка на сервер !!!")'
                    )) !!}
                    {!! Form::close() !!}
                    <a href="{{ route("admin.products_filters.index",["products_id"=>$product->id]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-filter" aria-hidden="true"></i> Фільтри
                        </button>
                    </a>
                    <a href="{{ route('admin.products_attributes.pivot.index', ['products_id' => $product->id]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Властивості товару
                        </button>
                    </a>
                    <a href="{{ route('admin.products_variations.groups.index', ['products_id' => $product->id]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Варіанти товару
                        </button>
                    </a>


                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна
                            інформація</a></li>
                    <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab_translates">Опис</a></li>
                    <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab_block_images">Зображеня</a>
                    </li>
                </ul>
                <div class="tab-content pt-4">
                    <div id="main_inf" class="tab-pane fade show active ">

                        {!! Form::model($product, [
                  'method' => 'PATCH',
                  'url' => route("admin.products.update",["id"=>$product->id]),
                  'class' => 'form-horizontal form-admin',
                  'files' => true
              ]) !!}
                        @include ('admin.products.form', ['submitButtonText' => 'Зберегти'])

                        {!! Form::close() !!}
                    </div>
                    @include("admin.products.translating_panel")
                    @include("admin.products.image_block",["product"=>$product])
                </div>
            </div>
        </div>
    </div>

@endsection

