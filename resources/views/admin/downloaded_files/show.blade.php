@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section('content')

    <div class="card">
        <div class="card-header">Файл {{ $file->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.downloaded_files.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>
                <a href="{{route("admin.downloaded_files.edit",['id'=>$file->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.downloaded_files.delete",['id'=>$file->id]),
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

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $file->id }}</td>
                    </tr>
                    <tr>
                        <th>Назва</th>
                        <td> {{ $file->name }} </td>
                    </tr>
                    <tr>
                        <th> Опис</th>
                        <td> {{ $file->description }} </td>
                    </tr>
                    <tr>
                        <th> Розмір</th>
                        <td> {{ $file->size}} </td>
                    </tr>
                    <tr>
                        <th> Створено</th>
                        <td> {{ $file->created_at }} </td>
                    </tr>
                    <tr>
                        <th> Відредаговано</th>
                        <td> {{ $file->updated_at }} </td>
                    </tr>

                    <tr>
                        <th> Файл</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a style="max-width: 100%;height: auto"
                                           href="{!! $file->url!!}">{{$file->file_name}} </a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
