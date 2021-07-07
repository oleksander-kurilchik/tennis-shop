@extends('layouts.backend')




@section("sub_title") - Категорії  @endsection


@section('content')

        <div class=" card">
            <div class="card-header">Редагувати категорию #{{ $category->id }}</div>
            <div class="card-body">
                <div class="header-admin-button">
                <a href="{{ route("admin.categories.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>
                {{--<a href="{{ route("admin.categories.index") }}" title="Сховати товари "--}}
                   {{--onclick="return confirm('Підтвердити приховання товарів?')">--}}
                    {{--<button class="btn btn-warning btn-sm"><i class="fa fa-eye-slash " aria-hidden="true"></i>--}}
                        {{--Сховати всі товари--}}
                    {{--</button>--}}
                {{--</a>--}}

{{--                    {!! Form::open([--}}
{{--                                      'method' => 'POST',--}}
{{--                                      'url' => route("admin.categories.unpublish_products",["id"=>$category->id]),--}}
{{--                                      'style' => 'display:inline',--}}

{{--                                  ]) !!}--}}

{{--                    {!! Form::button('<i class="fa fa-eye-slash" aria-hidden="true"></i>  Сховати всі товари', array(--}}
{{--                                       'type' => 'submit',--}}
{{--                                       'class' => 'btn btn-warning  btn-sm',--}}
{{--                                       'title' => 'Сховати товари',--}}
{{--                                       'onclick'=>'return confirm("Підтвердити приховання товарів?")'--}}
{{--                               )) !!}--}}




{{--                    {!! Form::close() !!}--}}



{{--                    {!! Form::open([--}}
{{--                                     'method' => 'POST',--}}
{{--                                     'url' => route("admin.categories.publish_products",["id"=>$category->id]),--}}
{{--                                     'style' => 'display:inline',--}}

{{--                                 ]) !!}--}}

{{--                    {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>  Опублікувати всі товари', array(--}}
{{--                                       'type' => 'submit',--}}
{{--                                       'class' => 'btn btn-warning  btn-sm',--}}
{{--                                       'title' => 'Опублікувати всі товари',--}}
{{--                                       'onclick'=>'return confirm("Підтвердити Опублікування товарів?")'--}}
{{--                               )) !!}--}}




{{--                    {!! Form::close() !!}--}}

{{--                    <div>--}}


{{--                    </div>--}}



                {{--<a href="{{ route("admin.categories.index") }}" title="Сховати товари "--}}
                       {{--onclick="return confirm('Підтвердити приховання товарів?')">--}}
                        {{--<button class="btn btn-warning btn-sm"><i class="fa fa-eye " aria-hidden="true"></i>--}}
                            {{--Опублікувати всі товари--}}
                        {{--</button>--}}
                    {{--</a>--}}
                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li class="nav-item " ><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна інформація</a></li>
                    <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#translates">Опис</a></li>
                    <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#tab_block_images">Зображення</a></li>
                </ul>


                <div class="tab-content">
                    <div id="main_inf" class="tab-pane fade show active pt-4">


                        {!! Form::model($category, [
                            'method' => 'PATCH',
                            'url' => route("admin.categories.update",["id"=>$category->id]),
                            'class' => 'form-horizontal  form-admin',
                            'files' => true
                        ]) !!}

                        @include ('admin.categories.form', ['submitButtonText' => 'Оновити'])

                        {!! Form::close() !!}
                    </div>
                   @include("admin.categories.translating_panel")

                    <div id="tab_block_images" class="tab-pane fade">
                        @include("admin.categories.image_block",["category"=>$category])
                    </div>


                </div>
            </div>
        </div>


@endsection
