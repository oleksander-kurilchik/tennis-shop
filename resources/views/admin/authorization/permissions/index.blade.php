@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") -  Права (permissions)    @endsection

@section('content')
    <div class="card">
        <div class="card-header"> Права (permissions)  </div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success btn-sm"
                   title="">
                    <i class="fa fa-plus" aria-hidden="true"></i> Додати новий дозвіл
                </a>

            </div>
            @include('admin.global.message_block')
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 14px;">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>Назва</th>
                        <th style="width: 221px;">Дії</th>
{{--                        <th>Дочірні елементи</th>--}}
                    </tr>
                    </thead>
                    <tbody class="sortable_body" id="category_sortable_body">
                    @foreach($permissions as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td> {{ $item->name }}  </td>

{{--                            <td>{{ $item->published?"Tak":"Ні"}}</td>--}}
                            <td>



                                <a href="{{  route("admin.permissions.show",["id"=>$item->id])}}" title="Перегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                           aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{route("admin.permissions.edit",["id"=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true"></span>
                                    </button>
                                </a>
                                 {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.permissions.delete",["id"=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердження видалення?")'
                                )) !!}
                                {!! Form::close() !!}


                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            <div class="">
                {!! $permissions->links()!!}
            </div>

        </div>
    </div>


@stop
