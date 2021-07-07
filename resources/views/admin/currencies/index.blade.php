@extends('layouts.backend')
@section("sub_title") - Курси валют @endsection

@section('content')
    <div class="card">
        <div class="card-header">Курси валют </div>
        <div class="card-body">

            @include("admin.global.message_block")
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
{{--                        <th>@sortablelink('title', 'Заголовок')</th>--}}
                        <th>Курс</th>
                         <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($currencies as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                             <td>{{$item->course}}</td>

                            <td>

                                <a href="{{ route("admin.currencies.edit",['id'=>$item->id]) }}"
                                   title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
             </div>
        </div>
    </div>
@endsection
