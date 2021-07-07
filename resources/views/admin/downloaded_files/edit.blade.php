@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop


@section('content')
    <div class="card">
        <div class="card-header">Редарувати доданий файл #{{ $file->id }} - {{ $file->name }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.downloaded_files.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::model($file, [
                'method' => 'PATCH',
                'url' => route("admin.downloaded_files.update",['id'=>$file->id]),
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}
            @include ('admin.downloaded_files.form', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
