@extends('layouts.backend')




@section("sidebar")
    @include('admin.sidebar')
@stop


@section('content')

    <div class="card">
        <div class="card-header">Фільтри товару #{{$product->id}} - {{$product->name}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.products.edit",["id"=>$product->id]) }}" class="btn btn-warning btn-sm"
                   title="Назад до продукту">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад до продукту
                </a>

            </div>
            @include("admin.global.message_block")
            {!! Form::open(['method' => 'POST', 'url' =>  route("admin.products_filters.update",["products_id"=>$product->id]) , 'class' => 'navbar-form'])  !!}
            @foreach($filters as $filter)

                <div class="card  mt-4">
                    <div class="card-header">{{$filter->name}}</div>
                    <div class="card-body">
                        @foreach($filter->values as $value)

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="filters_values[]" value="{{$value->id}}"
                                           @if(in_array($value->id,$filters_values_arr)) checked @endif

                                    > {{$value->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="text-center pt-4 pb-5">
                {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
