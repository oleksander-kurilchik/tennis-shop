@extends('layouts.backend')

@section("sub_title") - Файловий менеджер  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Файловий менеджер</div>
        <div class="card-body">

            @include("admin.global.message_block")
            <div class="row">
                <div class="col-md-12">
                    <iframe src="/admin/laravel-filemanager" style="width: 100%; min-height: 700px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>

        </div>
    </div>
@endsection
