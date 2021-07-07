@extends('layouts.backend')
@section("sub_title") - Команди artisan    @endsection
@section('content')
    <div class="card">
        <div class="card-header">Команда {{$command->name}}" : artisan {{ $command->command }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route("admin.artisan_commands.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>

{{--                {!! Form::open([--}}
{{--                    'method'=>'DELETE',--}}
{{--                    'url' => route("admin.artisan_commands.delete",['id'=>$questionFeedback->id]),--}}
{{--                    'style' => 'display:inline'--}}
{{--                ]) !!}--}}
{{--                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(--}}
{{--                        'type' => 'submit',--}}
{{--                        'class' => 'btn btn-danger btn-sm',--}}
{{--                        'title' => 'Видалити',--}}
{{--                        'onclick'=>'return confirm("Підтвердити видалиит?")'--}}
{{--                ))!!}--}}
{{--                {!! Form::close() !!}--}}

                
            </div>
            @include("admin.global.message_block")

            <div class="table table-striped">
                <table class="table table-borderless">
                    <tbody>

                    <tr>
                        <th>Імя</th>
                        <td> {{ $command->name }} </td>
                    </tr>
                    <tr>
                        <th colspan="2">Опис команди</th>

                    </tr>
                    <tr>
                        <td colspan="2">
                            {{$command->description}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">

                           {!!  Form::open([
                            'method'=>'POST',
                            'url' => route('admin.artisan_commands.execute',['id'=>$command->id]),
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('Запустити команду <i class="fa fa-play" aria-hidden="true"></i> ', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Запустити команду',
                                    'onclick'=>'return confirm("Підтвердити запуск команди?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>



                    @if (Session::has('flash_artisan_output'))
                        <tr>
                            <th colspan="2">Результат виконання команди</th>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <code>
                                {!!  nl2br (Session::get('flash_artisan_output')) !!}
                                </code>
                            </td>
                        </tr>
                    @endif



                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
