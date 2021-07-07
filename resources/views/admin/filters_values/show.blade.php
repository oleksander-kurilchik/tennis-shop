@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop

@section("sub_title") - Значення фільтра перегляд  @endsection
@section('content')

        <div class="card">
            <div class="card-header">Фільтр {{ $filters_value->id }} - {{$filters_value->name}}</div>
            <div class="card-body">

                <a href="{{ route("admin.filters_values.index",["filters_id"=>$filter->id])}}" title="Назад">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </a>
                <a href="{{route("admin.filters_values.edit",["filters_id"=>$filter->id,"id"=>$filters_value->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.filters_values.delete",["filters_id"=>$filter->id,"id"=>$filters_value->id]),
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Видалити товар',
                        'onclick'=>'return confirm("Підтвердити видалення?")'
                ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $filters_value->id }}</td>
                        </tr>
                        <tr>
                            <th> Назва</th>
                            <td> {{ $filters_value->name }} </td>
                        </tr>
                        <tr>
                            <th> Сортування</th>
                            <td> {{ $filters_value->order }} </td>
                        </tr>
                         

                        <tr>
                            <th> Опубліковано</th>
                            <td> {{ $filters_value->published==true?"Так" :"Ні" }} </td>
                        </tr>

                        </tbody>
                    </table>
                </div>


                <div class="language-tabs-wrapper pb-4">
                    <div class="t-header">Список перекладів</div>
                    <ul class="nav nav-tabs" role="tablist">
                        @forelse($filters_value->translating as $trans_item)
                            <li role="presentation" class=" nav-item">
                                <a class="nav-link @if ($loop->first) active @endif"
                                        aria-controls="tr_tab_{!! $loop->index !!}"
                                        href="#tr_tab_{!! $loop->index !!}" role="tab" data-toggle="tab">
                                    {!! $trans_item->language->name !!}
                                </a></li>
                        @empty
                        @endforelse
                    </ul>
                    <div class="tab-content">
                        @forelse($filters_value->translating as $trans_item)
                            <div role="tabpanel" class="tab-pane fade pt-4 @if ($loop->index==0) show active @endif"
                                 id="tr_tab_{!!$loop->index!!}">
                                <div class=" translating_item_wrapper">
                                    <dl class="dl-horizontal">
                                        <dt>Заголовок</dt>
                                        <dd>{!!$trans_item->title!!}</dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt>Опис</dt>
                                        <dd>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    {!!$trans_item->description!!}
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Короткий опис</dt>
                                        <dd>{{$trans_item->short_description}}</dd>
                                    </dl>
                                    {{--<dl class="dl-horizontal">--}}
                                        {{--<dt>Seo Title</dt>--}}
                                        {{--<dd>{!!$trans_item->seo_title!!}</dd>--}}
                                    {{--</dl>--}}
                                    {{--<dl class="dl-horizontal">--}}
                                        {{--<dt>Seo Keywords</dt>--}}
                                        {{--<dd>{!!$trans_item->seo_keywords!!}</dd>--}}
                                    {{--</dl>--}}
                                    {{--<dl class="dl-horizontal">--}}
                                        {{--<dt>Seo Description</dt>--}}
                                        {{--<dd>{!!$trans_item->seo_description!!}</dd>--}}
                                    {{--</dl>--}}
                                    {{--<dl class="dl-horizontal">--}}
                                        {{--<dt>Seo Text</dt>--}}
                                        {{--<dd>{!!$trans_item->seo_text!!}</dd>--}}
                                    {{--</dl>--}}
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                 </div>
            </div>
        </div>
@endsection
