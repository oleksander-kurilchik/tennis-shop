@extends('layouts.backend')
@section("sub_title") - Слайдер головної сторінки  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Слайдер головної сторінки</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.main-slider.create") }}" class="btn btn-success btn-sm"
                   title="Дoдати слайдер">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати новий слайдер
                </a>

                {!! Form::open(['method' => 'GET', 'url' => route("admin.main-slider.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include("admin.global.search_input")
                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>
{{--                        <th>@sortablelink('title', 'Заголовок')</th>--}}
                        <th>@sortablelink('published', 'Опубліковано')</th>
                        <th>@sortablelink('order', 'Сортування')</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mainslider as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
{{--                            <td>{{ $item->title }}</td>--}}
                            <td>{{$item->published?"Так":"Ні"}}</td>
                            <td>
                                {!! Form::open([
                                        'method'=>'post',
                                        'url' => route("admin.main-slider.order",['id'=>$item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                {!! Form::number("order",$item->order,['class' => 'form-control', 'required' => 'required',"onChange"=>"this.form.submit()","style"=>"width:140px"]) !!}


                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{ route("admin.main-slider.show",['id'=>$item->id]) }}"
                                   title="Перерегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.main-slider.edit",['id'=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.main-slider.delete",['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $mainslider->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
