@extends('layouts.backend')


@section("sub_title") - Роль  @endsection

@section('content')

    <div class=" card">
        <div class="card-header">Роль {{ $role->id }}</div>
        <div class="card-body">
            <a href="{{ route("admin.roles.index") }}" title="Назад ">
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
                        <td>{{ $role->id }}</td>
                    </tr>

                    <tr>
                        <th> Назва</th>
                        <td> {{ $role->name}} </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
