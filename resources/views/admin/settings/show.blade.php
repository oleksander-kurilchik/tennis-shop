@extends('layouts.backend')
@section("sub_title") - Налаштування @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Налаштування - "{{$setting->name}}" #{{ $setting->id }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route("admin.settings.index",['settingsGroups'=>$setting->settings_groups_id])}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>

            </div>
            @include("admin.global.message_block")

            <div class="table table-striped">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $setting->id }}</td>
                    </tr>
                    <tr>
                        <th>Назва</th>
                        <td> {{ $setting->name }} </td>
                    </tr>
                    <tr>
                        <th> Ключ</th>
                        <td> {{ $setting->key }} </td>
                    </tr>

                    <tr>
                        <th> Група</th>
                        <td> {{ $setting->settingsGroup->name }} </td>
                    </tr>

                    <tr>
                        <th> Правила валідації</th>
                        <td> {{ $setting->validation_rules }} </td>
                    </tr>
                    @if($setting->comment)
                        <tr>
                            <th> Коментар</th>
                            <td> {{ $setting->comment }} </td>
                        </tr>
                    @endif
                    <tr>
                        <th> Чи може редагуватися</th>
                        <td> {{ $setting->canEdit()?"Так":"Ні" }} </td>
                    </tr>
                    <tr>
                        <th> Чи може Видалятися</th>
                        <td> {{ $setting->canDelete()?"Так":"Ні" }} </td>
                    </tr>


                    <tr>
                        <th colspan="2"> Значення</th>

                    </tr>
                    <tr>
                        <td colspan="2">
                            @if($setting->input_type!='ckeditor')
                                {{ $setting->value }}
                            @else
                                {!!  $setting->value !!}
                            @endif
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
