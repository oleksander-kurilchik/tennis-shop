@extends('layouts.backend')
@section("sub_title") - Відгуки  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Відгук - "{{$review->name}}" #{{ $review->id }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route("admin.reviews.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>
                <a href="{{route("admin.reviews.edit",['id'=>$review->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.reviews.delete",['id'=>$review->id]),
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Видалити',
                        'onclick'=>'return confirm("Підтвердити видалиит?")'
                ))!!}
                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")

            <div class="table table-striped">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $review->id }}</td>
                    </tr>
                    <tr>
                        <th>Назва</th>
                        <td> {{ $review->name }} </td>
                    </tr>
                    <tr>
                        <th> Заголовок</th>
                        <td> {{ $review->title }} </td>
                    </tr>
                    <tr>
                        <th> Опис</th>
                        <td> {{ $review->description }} </td>
                    </tr>
                    <tr>
                        <th> Мова</th>
                        <td>
                            @if($review->language!=null)
                                {{$review->language->name}}
                            @else
                                Мультимовний
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th> Сортування</th>
                        <td> {{ $review->sorting }} </td>
                    </tr>
                    <tr>
                        <th> Опубліковано</th>
                        <td>  @if($review->published==true)Так@elseНі@endif </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
