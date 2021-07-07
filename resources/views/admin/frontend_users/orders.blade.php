@extends('layouts.backend')



@section("sub_title") - Замовлення  @endsection
@section('content')
    <?php
    use Carbon\Carbon;
    ?>

    <div class="card">
        <div class="card-header">Замовлення користувача {{$user->id}}:{{$user->first_name}} {{$user->last_name}} - {{$user->email}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <div class="pb-3">
                    <a href="{{ route("admin.frontend_users.index") }}" class="btn btn-success btn-sm" >
                        <i class="fa fa-arrow-left" aria-hidden="true" ></i> Назад
                    </a>
                </div>

            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 0.8rem;">
                    <thead>
                    <tr>
                        <th>
                            Статус
                        </th>
                        <th>ID</th>
                        <th width="200">Кліент</th>
                        <th width="200">Користувач</th>

                        <th>Ціна</th>
                        <th>Валюта</th>
                        <th>Дата</th>
                        <th>Кількість</th>
                        <th style="min-width: 125px;">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>


                            <td>
                                @switch($item->order_status)
                                    @case(0)
                                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top" title="{{$item->status_text}}"></i>
                                    @break
                                    @case(1)
                                    <i class="fa fa-spinner  fa-2x" data-toggle="tooltip" data-placement="top"
                                       title="{{$item->status_text}}  "></i>
                                    @break
                                    @case(2)
                                    <i class="fa fa-ban fa-2x" aria-hidden="true" style="color: darkred"
                                       data-toggle="tooltip" data-placement="top"
                                       title="{{$item->status_text}}"></i>
                                    @break
                                    @case(3)
                                    <i class="fa fa-check-square-o fa-2x" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top" title="{{$item->status_text}}"></i>
                                    @break
                                    @case(4)
                                    <i class="fa fa-credit-card  fa-2x" style="color: red" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top" title="{{$item->status_text}}"></i>
                                    @break
                                    @case(5)
                                    <i class="fa fa-check fa-2x" style="color: #00ff00" aria-hidden="true" data-toggle="tooltip"
                                       data-placement="top" title="{{$item->status_text}}"></i>
                                    @break
                                @endswitch
                            </td>


                            <td>{{ $item->id }} </td>
                            <td style="max-width: 150px">
                                {{$item->first_name}}
                            </td>
                             <td style="max-width: 150px">
                                 @if($item->user)
{{--                                     <a href="#">--}}
                                         {{$item->user->last_name}} {{$item->user->first_name}}
{{--                                     </a>--}}
                                 @else
                                     Не зареєстрований
                                 @endif
                            </td>
                            <td>
                                @if($item->price)
                                    {{$item->price->price}}
{{--                                    {{$item->price->currency->code}}--}}
                                @endif


                            </td>
                            <td>
                                {{$item->currency->name}}
                            </td>

                            <td>{{ Carbon::parse($item->date_order)->formatLocalized('%d.%m.%Y  %H:%M:%S')}}</td>
                            <td>
                                {{$item->total_count}}
                            </td>

                            <td>
                                <a href="{{route("admin.orders.show",["id"=>$item->id])}}" title="Перегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.orders.edit",["id"=>$item->id]) }}" title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
@endsection

