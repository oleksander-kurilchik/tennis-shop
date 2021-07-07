@extends('layouts.backend')

@section("sub_title") - Іерархія категорій  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Іерархія категорій</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route("admin.categories.index") }}" title="Назад ">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </button>
                </a>
                @include("admin.global.message_block")
                <div class="px-0 pt-3">

                    <div class=" ">
                        <div class="dd">
                            @include('admin.categories.parts.categories_hierarchy.items_list',['items'=>$categories->sortBy('order')])
                        </div>

                        <div class="form-group py-5">
                            <div class=" col-md-12" style="text-align: center">
                                <input class="btn btn-primary js-menu-items-order-save" type="button" value="Зберегти порядок ">
                            </div>
                        </div>

                    </div>
                </div>
        </div>





    </div>

    @include('admin.categories.parts.categories_hierarchy.resources')
@stop

