@extends('layouts.backend')


@section("sub_title") - Атрибути групи: {{$group->name}}   @endsection
@section('content')
    <div class="card">
        <div class="card-header">  Атрибути групи: {{$group->name}}  </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.products_attributes.groups.edit',['id'=>$group->id]) }}" class="btn btn-success btn-sm"
                                                  title="">
                    <i class="fa fa-backward" aria-hidden="true"></i> Повернутися до групи
                </a>
                <a href="{{ route('admin.products_attributes.attributes.create',['group_id'=>$group->id]) }}" class="btn btn-success btn-sm"
                   title="Додати товар">
                    <i class="fa fa-plus" aria-hidden="true"></i> Створити атрибут
                </a>

                <div>
                    {!! Form::open(['method' => 'GET', 'url' =>  route('admin.products_attributes.attributes.index',['group_id'=>$group->id]) , 'class' => 'form-group pb4 pt-4', 'role' => 'category'])  !!}
                    <div class="pt-3">
                        @include('admin.global.search_input')
                    </div>
                    {!! Form::close() !!}
                    <div class="input-group">
                        <a href="{{ route('admin.products_attributes.attributes.index',['group_id'=>$group->id])}}" class="btn btn-primary btn-sm">Скинути
                            Пошук
                        </a>
                    </div>

                </div>
            </div>
            @include('admin.global.message_block')

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr style="font-size: 14px">
                        <th>
                            <div class="d-flex align-items-center">@sortablelink('id', 'ID')</div>
                        </th>
                        <th>
                            <div class="d-flex align-items-center"> @sortablelink('name', 'Назва')</div>
                        </th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attributes as $item)
                        <tr>
                            <td>{{ $item->id }} </td>
                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->name }}</div>
                            </td>

                            <td style="min-width: 130px">
{{--                                <a href="{{route("admin.products_attributes.groups.show",['id'=>$item->id])}}"--}}
{{--                                   title="Перегляд">--}}
{{--                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('admin.products_attributes.attributes.edit',['id'=>$item->id]) }}"
                                   title="Редагувати">
                                    <i class="fa fa-pencil-square-o"   aria-hidden="true"></i>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('admin.products_attributes.attributes.delete',['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити продукт',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $attributes->appends( Request::except(["page","_token"]))!!} </div>

            </div>

        </div>
    </div>

@endsection

