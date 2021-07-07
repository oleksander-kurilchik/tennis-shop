@extends('layouts.backend')
@section("sub_title") - Слайдер головної сторінки  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Слайдер головної сторінки - "{{$mainslider->name}}" #{{ $mainslider->id }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route("admin.main-slider.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>
                <a href="{{route("admin.main-slider.edit",['id'=>$mainslider->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.main-slider.delete",['id'=>$mainslider->id]),
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
                        <td>{{ $mainslider->id }}</td>
                    </tr>
                    <tr>
                        <th>Назва</th>
                        <td> {{ $mainslider->name }} </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th> Заголовок</th>--}}
{{--                        <td> {{ $mainslider->title }} </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th> Опис</th>--}}
{{--                        <td> {{ $mainslider->description }} </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th> Мова</th>
                        <td>
                            @if($mainslider->language!=null)
                                {{$mainslider->language->name}}
                            @else
                                Мультимовний
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th> Сортування</th>
                        <td> {{ $mainslider->order }} </td>
                    </tr>
                    <tr>
                        <th> Опубліковано</th>
                        <td>  @if($mainslider->published==true)Так@elseНі@endif  </td>
                    </tr>

                    <tr>
                        <th> Зображення</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img style="max-width: 100%;height: auto"
                                             src="{!! $mainslider->image->path_1x !!}"></td>
                    </tr>
                    <tr>
                        <th> Зображення sm</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img style="max-width: 100%;height: auto"
                                             src="{!!  $mainslider->imageSm->path_1x !!}"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
