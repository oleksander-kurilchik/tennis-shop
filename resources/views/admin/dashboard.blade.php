@extends('layouts.backend')

@section('content')

            <div class="card">
                <div class="card-header">Адмін-панель</div>
                <div class="card-body">
                    @include("admin.global.message_block")
                    Ваша адмін панель
                </div>
            </div>

@endsection
