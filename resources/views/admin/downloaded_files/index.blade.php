@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop

@section('content')
    <div class="card">
        <div class="card-header">Завантажені файли</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.downloaded_files.create") }}" class="btn btn-success btn-sm"
                   title="Дoдати файл">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати файл
                </a>
                {!! Form::open(['method' => 'GET', 'url' => route("admin.downloaded_files.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include("admin.global.search_input")
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>
                        <th>Опис</th>
                        <th>@sortablelink('size', 'Розмір')</th>
                        <th>@sortablelink('created_at', 'Створено')</th>
                        <th>@sortablelink('updated_at', 'Оновлено')</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{$item->url}}">{{ $item->name }}</a></td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route("admin.downloaded_files.show",['id'=>$item->id]) }}"
                                   title="Перерегляд">
                                    <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.downloaded_files.edit",['id'=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.downloaded_files.delete",['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $files->appends(Request::except(['page']))->render() !!} </div>
            </div>
        </div>
    </div>
 @endsection
