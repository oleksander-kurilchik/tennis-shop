@extends('layouts.backend')


@section("sub_title") - Права (permissions)   @endsection

@section('content')

    <div class=" card">
        <div class="card-header">Права (permissions)  {{ $permission->id }}</div>
        <div class="card-body">
            <a href="{{ route("admin.permissions.index") }}" title="Назад ">
                <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </button>
            </a>


            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $permission->id }}</td>
                    </tr>

                    <tr>
                        <th> Назва</th>
                        <td> {{ $permission->name}} </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
