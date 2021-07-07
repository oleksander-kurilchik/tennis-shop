@extends('layouts.backend')

@section("sub_title") - Режим обслуговування  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Режим обслуговування </div>
        <div class="card-body">
            @include("admin.global.message_block")
            @if (app()->isDownForMaintenance())
            <h1 class="text-danger">
                Сайт знаходиться в режимі обслуговування
            </h1>

                {!! Form::open(['url' => route("admin.maintenance_mode.toggleMode"), 'class' => 'form-horizontal form-admin  pt-4 pb-4']) !!}

                    <button type="submit" class="btn btn-primary">Перевести в нормальний режим</button>
                {!! Form::close() !!}
            @else
                <h1>
                    Сайт знаходиться в робочому режимі
                    {!! Form::open(['url' => route("admin.maintenance_mode.toggleMode"), 'class' => 'form-horizontal form-admin  pt-4 pb-4']) !!}

                    <button type="submit" class="btn btn-danger">Перевести в режим обслуговування</button>
                    {!! Form::close() !!}
                </h1>
            @endif

        </div>
    </div>
@endsection
