@extends('layouts.backend')


@section("sub_title") - Товари групи: {{$group->name}}   @endsection
@section('content')
    <div class="card">
        <div class="card-header">  Товари групи: {{$group->name}}  </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.products_variations.groups.edit',['id'=>$group->id]) }}" class="btn btn-success btn-sm"
                                                  title="">
                    <i class="fa fa-backward" aria-hidden="true"></i> Повернутися до групи
                </a>
                <a href="{{ route('admin.products_variations.items.create',['group_id'=>$group->id]) }}" class="btn btn-success btn-sm"
                   title="Додати товар">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати товар
                </a>

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
                        <th>
                            <div class="d-flex align-items-center"> @sortablelink('products_id', 'Товар')</div>
                        </th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }} </td>
                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->name }}</div>
                            </td>
                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->product->name }}</div>
                            </td>

                            <td style="min-width: 130px">
{{--                                <a href="{{route("admin.products_variations.groups.show",['id'=>$item->id])}}"--}}
{{--                                   title="Перегляд">--}}
{{--                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('admin.products_variations.items.edit',['id'=>$item->id]) }}"
                                   title="Редагувати">
                                    <i class="fa fa-pencil-square-o"   aria-hidden="true"></i>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('admin.products_variations.items.delete',['id'=>$item->id]),
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


            </div>

        </div>
    </div>

@endsection

