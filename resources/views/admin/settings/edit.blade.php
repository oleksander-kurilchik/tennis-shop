@extends('layouts.backend')
@section("sub_title") - Налаштування @endsection
@section('content')
    <div class="card">
        <div class="card-header">Редарувати налаштування - "{{$setting->name}}" #{{ $setting->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.settings.index',['settingsGroups'=>$setting->settings_groups_id]) }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::model($setting, [
                'method' => 'PATCH',
                'url' => route("admin.settings.update",['id'=>$setting->id]),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true
            ]) !!}
            @include ('admin.settings.forms.edit', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
