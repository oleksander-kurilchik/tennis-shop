@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section('content')
    <div  id="product-content">
        <div class="card">
            <div class="card-header">Редагувати фільтр #{{ $filter->id }} - {{$filter->name}} </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.filters.index") }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                        </button>
                    </a>

                    <a href="{{ route("admin.filters_values.index",["filters_id"=>$filter->id]) }}" title="Значення фільтрів">
                        <button class="btn btn-success btn-sm"><i class="fa fa-filter" aria-hidden="true"></i> Значення фільтрів
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")


                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#main_inf">Головна інформація</a></li>
                    <li class="nav-item"><a  class="nav-link "  data-toggle="tab" href="#tab_translates">Опис</a></li>
                 </ul>

                <div class="tab-content pt-4">
                    <div id="main_inf" class="tab-pane fade show active ">

                        {!! Form::model($filter, [
                  'method' => 'PATCH',
                  'url' => route("admin.filters.update",["id"=>$filter->id]),
                  'class' => 'form-horizontal form-admin',
                  'files' => true
              ]) !!}
                        @include ('admin.filters.form', ['submitButtonText' => 'Зберегти'])

                        {!! Form::close() !!}


                    </div>
                    @include("admin.filters.translating_panel")


                </div>
            </div>
        </div>
    </div>

@endsection
