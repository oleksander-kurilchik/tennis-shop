@extends('layouts.backend')

@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Категорії  @endsection

@section('content')

    <div class=" card">
        <div class="card-header">Категорія {{ $category->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">


                    <a href="{{ route("admin.categories.index") }}" class="btn btn-success btn-sm" title="Назад ">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </a>

                <a href="{{route("admin.categories.edit",["id"=>$category->id]) }}"
                   title="Редагувати">
                    <button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"
                                                                 aria-hidden="true"></span>
                    </button>
                </a>
            </div>

        <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <th> Категория</th>
                        <td> {{ $category->getParentLevelName()}} </td>
                    </tr>
                    <tr>
                        <th> Назва</th>
                        <td> {{ $category->name}} </td>
                    </tr>
                    <tr>
                        <th> Сортування</th>
                        <td> {{ $category->order }} </td>
                    </tr>
                    <tr>
                        <th> Посилання</th>
                        <td> {{ $category->slug }} </td>
                    </tr>
                    <tr>
                        <th>Опубліковано</th>
                        <td>@if($category->published == true) Так @else Ні @endif</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="language-tabs-wrapper">
                <div class="t-header">Список перекладів</div>

                <ul class="nav nav-tabs" role="tablist">
                    @forelse($category->translating as $trans_item)
                        <li role="presentation" class="nav-item">
                            <a class="nav-link @if ($loop->first) active @endif"
                               aria-controls="tr_tab_{!! $loop->index !!}"
                               href="#tr_tab_{!! $loop->index !!}" role="tab" data-toggle="tab">
                                {!! $trans_item->language->name !!}
                            </a>
                        </li>
                    @empty

                    @endforelse
                </ul>
                <div class="tab-content">
                    @forelse($category->translating as $trans_item)
                        <div role="tabpanel" class="tab-pane pt-4 fade @if ($loop->index==0) show active @endif"
                             id="tr_tab_{!!$loop->index!!}">
                            <div class=" translating_item_wrapper">
                                <dl class="dl-horizontal">
                                    <dt>Заголовок</dt>
                                    <dd>{!!$trans_item->title!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Опис</dt>
                                    <dd>
                                        <div class=" card">
                                            <div class="card-body">
                                                {!!$trans_item->description!!}
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Короткий опис</dt>
                                    <dd>{!!$trans_item->short_description!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Seo Title</dt>
                                    <dd>{!!$trans_item->seo_title!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Seo Keywords</dt>
                                    <dd>{!!$trans_item->seo_keywords!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Seo Description</dt>
                                    <dd>{!!$trans_item->seo_description!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Seo Text</dt>
                                    <dd>{!!$trans_item->seo_text!!}</dd>
                                </dl>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            @include("admin.global.image_block_simple",["images"=>$category->images])
        </div>
    </div>

@endsection
