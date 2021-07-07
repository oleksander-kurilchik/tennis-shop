@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section('content')
    <div  id="product-content">
        <div class="card">
            <div class="card-header">Редагувати значення фільтра #{{ $filters_value->id }} - {{$filters_value->name}} для фільтра "{{$filter->name}}" </div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.filters_values.index",["filters_id"=>$filter->id]) }}" title="Назад">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
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

                        {!! Form::model($filters_value, [
                  'method' => 'PATCH',
                  'url' => route("admin.filters_values.update",[ "filters_id"=>$filter->id , "id"=> $filters_value->id ]),
                  'class' => 'form-horizontal form-admin',
                  'files' => true
              ]) !!}
                        @include ('admin.filters_values.form', ['submitButtonText' => 'Зберегти'])

                        {!! Form::close() !!}


                    </div>
                    @include("admin.filters_values.translating_panel")


                </div>
            </div>
        </div>
    </div>

@endsection
