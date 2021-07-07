@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop

@section("sub_title") - Налаштування  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Налаштування</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.settings.create") }}" class="btn btn-success btn-sm"
                   title="Дoдати слайдер">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати нове налаштування
                </a>

                {!! Form::open(['method' => 'GET', 'url' => route("admin.settings.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                <div class="input-group pb-3">
                    <select class="form-control" name="settingsGroups" onchange="form.submit()">
                        <option @if(Request::get('settingsGroups')==null) selected @endif default autocomplete="off"
                                value="">
                            Виберіть групу налаштувань
                        </option>
                        @foreach($settingsGroups as $item)
                            <option value="{{$item->id}}"
                                    @if(Request::get('settingsGroups')==$item->id) selected="selected"
                                    @endif   autocomplete="off"> {{$item->name}} </option>
                        @endforeach
                    </select>
                </div>
                @include("admin.global.search_input")
                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('settings_groups_id', 'Група')</th>
                        <th>@sortablelink('name', 'Назва')</th>
                        <th>@sortablelink('key', 'Ключ')</th>
                        <th>@sortablelink('langueges_id', 'Мова')</th>
{{--                        <th>@sortablelink('settings_groups_id', 'Група')</th>--}}
                        <th style="min-width: 150px">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->settingsGroup->name }}</td>
                            <td style="font-size: 14px; max-width: 150px">{{ $item->name }}</td>
                            <td style="font-size: 14px; max-width: 150px">{{ $item->key }}</td>
                            <td style="font-size: 14px; max-width: 150px">
                                @if($item->languages_id) {{$item->languages_id}}  @else Мультимовне  @endif
                            </td>


                            <td>
                                <a href="{{ route("admin.settings.show",['id'=>$item->id]) }}"
                                   title="Перерегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                @if($item->canEdit())
                                    <a href="{{ route("admin.settings.edit",['id'=>$item->id]) }}"
                                       title="Редагувати">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i></button>
                                    </a>
                                @endif
                                @if($item->canDelete())
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('admin.settings.delete',['id'=>$item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Видалити',
                                            'onclick'=>'return confirm("Підтвердити видалення?")'
                                    )) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $settings->appends(  Request::except(['page']))->render() !!} </div>
            </div>
        </div>
    </div>
@endsection

