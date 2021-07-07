@extends('layouts.backend')
@section("sub_title") - Зворотній зв'язок  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Зворотній зв'язок - "{{$feedback->name}}" #{{ $feedback->id }}</div>
        <div class="card-body">

            <div class="header-admin-button">
                <a href="{{ route('admin.feedback.index')}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>

                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route('admin.feedback.delete',['id'=>$feedback->id]),
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Видалити',
                        'onclick'=>'return confirm("Підтвердити видалиит?")'
                ))!!}
                {!! Form::close() !!}


            </div>
            @include('admin.global.message_block')

            <div class="table table-striped">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $feedback->id }}</td>
                    </tr>
                    <tr>
                        <th>Імя</th>
                        <td> {{ $feedback->name }} </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>Телефон</th>--}}
{{--                        <td> {{ $feedback->phone }} </td>--}}
{{--                    </tr> --}}
                    <tr>
                        <th>Email</th>
                        <td> {{ $feedback->email }} </td>
                    </tr>
                    <tr>
                        <th>Повідомлення</th>
                        <td> {{ $feedback->description }} </td>
                    </tr>



                    <tr>
                        <th> Переглянуто </th>
                        <td>  {{$feedback->read_at??'Ні'}} </td>
                    </tr>
                    <tr>
                        <th> Відповіли </th>
                        <td>  @if($feedback->answered==true)Так@elseНі@endif  </td>
                    </tr>
                    <tr>
                        <th> IP</th>
                        <td>{{$feedback->ip}}  </td>
                    </tr>
                    <tr>
                        <th> User Agent</th>
                        <td>{{$feedback->user_agent}}  </td>
                    </tr>

                    <tr>
                        <th> Дата відправки</th>
                        <td>{{$feedback->created_at}}  </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
