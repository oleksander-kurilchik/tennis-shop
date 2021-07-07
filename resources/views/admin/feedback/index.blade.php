@extends('layouts.backend')
@section("sub_title") - Зворотній звязок  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Зворотній звязок</div>
        <div class="card-body">
            <div class="header-admin-button">


                {!! Form::open(['method' => 'GET', 'url' => route("admin.feedback.index"), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include("admin.global.search_input")
                {!! Form::close() !!}
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>
                        <th>@sortablelink('read_at', 'Переглянуто')</th>
                        <th>@sortablelink('answered', 'Відповіли')</th>

                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{$item->read_at??"Ні"}}</td>
                            <td> @if($item->answered==true)Так@elseНі@endif</td>
                            <td>
                                <a href="{{ route("admin.feedback.show",['id'=>$item->id]) }}"
                                   title="Перерегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.feedback.delete",['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}

                                {!! Form::open([
                                    'method'=>'POST',
                                    'url' => route("admin.feedback.answered",['id'=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-success btn-sm',
                                        'title' => 'Позначити як оброблене',
                                        'onclick'=>'return confirm("Позначити як оброблено?")'

                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $feedbacks->appends(Request::except('page'))->render() !!} </div>
            </div>
        </div>
    </div>
@endsection
