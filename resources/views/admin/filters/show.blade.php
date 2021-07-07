@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop

@section("sub_title") - Фільтр  @endsection
@section('content')

        <div class="card">
            <div class="card-header">Фільтр {{ $filter->id }} - {{$filter->name}}</div>
            <div class="card-body">

                <a href="{{ route("admin.filters.index")}}" title="Назад">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </a>
                <a href="{{route("admin.filters.edit",["id"=>$filter->id]) }}" title="Редагувати">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => route("admin.filters.delete",["id"=>$filter->id]),
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
                            <td>{{ $filter->id }}</td>
                        </tr>
                        <tr>
                            <th> Назва</th>
                            <td> {{ $filter->name }} </td>
                        </tr>
                        <tr>
                            <th> Сортування</th>
                            <td> {{ $filter->order }} </td>
                        </tr>


                        <tr>
                            <th> Опубліковано</th>
                            <td> {{ $filter->published==true?"Так" :"Ні" }} </td>
                        </tr>

{{--                        <tr>--}}
{{--                            <th> Категория</th>--}}
{{--                            <td> {{ $filter->category->level_name }} </td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>


                <div class="language-tabs-wrapper pb-4">
                    <div class="t-header">Список перекладів</div>
                    <ul class="nav nav-tabs" role="tablist">
                        @forelse($filter->translating as $trans_item)
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
                        @forelse($filter->translating as $trans_item)
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
