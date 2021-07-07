@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Логи доступу до адмінки  @endsection

@section('content')

    <div class="card">
        <div class="card-header">Логи  користувачів адмін панелі</div>
        <div class="card-body">

            {!! Form::open(['method' => 'GET', 'url' => route('admin.backend_users_log.login.index'), 'class' => ' form-group pb4 pt-4', 'role' => 'search'])  !!}
                @include('admin.global.search_input')
            {!! Form::close() !!}

            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID') </th>
                        <th>@sortablelink('user_name', 'Логін') </th>
                        <th>@sortablelink('user_email', 'Email') </th>
                        <th>@sortablelink('ip', 'IP')</th>
                        <th>@sortablelink('login_time', 'Дата')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users_log as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->user_email }}</td>
                            <td>{{ $item->ip }}</td>
                            <td>{{ $item->login_time }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $users_log->appends(Request::except(['page']) )->render() !!} </div>
            </div>
        </div>
    </div>

@endsection
