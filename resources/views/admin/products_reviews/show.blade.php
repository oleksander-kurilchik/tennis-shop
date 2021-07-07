@extends('layouts.backend')



@section("sub_title") - Відгуки кліентів  @endsection
@section('content')

    <div class="card">
        <div class="card-header">Відгук #{{ $review->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
            <a href="{{ route("admin.products-reviews.index")}}" title="Назад">
                <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                </button>
            </a>
            <a href="{{ route("admin.products-reviews.edit",["id"=>$review->id]) }}" title="Редагувати">
                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true">
                    </i></button>
            </a>

            {!! Form::open([
                'method'=>'DELETE',
                'url' => route("admin.products-reviews.delete",["id"=>$review->id]),
                'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Видалити ',
                    'onclick'=>'return confirm("Підтвердити видалення?")'
            ))!!}
            {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")


            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $review->id }}</td>
                    </tr>
                    <tr>
                        <th>Товар</th>
                        <td>
                            @if($review->product != null)
                                <a href="{{route("admin.products.show",["id"=>$review->products_id])}}">  {{$review->product->name}} </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th> Назва кліента</th>
                        <td> {{ $review->user_name }} </td>
                    </tr>
                    <tr>
                        <th> Email</th>
                        <td> {{ $review->email }} </td>
                    </tr>
                    <tr>
                        <th> Дата відправки</th>
                        <td> {{ $review->date_of_sending }} </td>
                    </tr>


                    <tr>
                        <th> Answered</th>
                        <td> {{ $review->answer != null ? "Так" : "Ні" }} </td>
                    </tr>
                    <tr>
                        <th> Опис</th>
                        <td>
                            <div class="thumbnail  thumbnail-admin-image"
                                 style="word-wrap: break-word;word-break: break-all;">
                                {{ $review->description}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th> IP</th>
                        <td> {{ $review->ip }} </td>
                    </tr>
                    <tr>
                        <th> Browser</th>
                        <td> {{ $review->user_agent }} </td>
                    </tr>

                    @if ($review->answer!= null)
                        <tr>

                            <td colspan="2">
                                <div class="card">
                                    <div class="card-header">Відповідь</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                <tr>
                                                    <th>Назва</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $review->answer->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Користувач</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $review->answer->user_name }}</td>
                                                </tr>


                                                <tr>
                                                    <th>Опис</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="thumbnail  thumbnail-admin-image"
                                                             style="word-wrap: break-word;word-break: break-all;">
                                                            {{ $review->answer->description}}
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Дата публікації</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $review->answer->date }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Опубліковано</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $review->answer->published? "Так":"Ні"}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
