@extends('layouts.backend')

@section("sub_title") - Лендинг  @endsection

@section('content')

    <div class="card admin-card">
        <div class="card-header admin-card__header">Лендинг {{ $landing_page->id }} - "{{$landing_page->name}}"</div>
        <div class="card-body admin-card__body">
            <div class="header-admin-button">
                <a href="{{  route("admin.landing_pages.edit",["id"=>$landing_page->id]) }}"
                   title="Редагувати">
                    <button class="btn btn-primary btn-xs"><span class="fa fa-pencil-square-o"
                                                                 aria-hidden="true"></span>
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' =>  route("admin.landing_pages.delete",["id"=>$landing_page->id]) ,
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Видалити',
                        'onclick'=>'return confirm("Підтвердження видалення?")'
                )) !!}
                {!! Form::close() !!}
            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $landing_page->id }}</td>
                    </tr>

                    <tr>
                        <th> Назва</th>
                        <td> {{ $landing_page->name}} </td>
                    </tr>
                    <tr>
                        <th> Посилання</th>
                        <td> {{ $landing_page->slug }} </td>
                    </tr>
                    <tr>
                        <th>Опубліковано</th>
                        <td>@if($landing_page->published == true) Так @else Ні @endif</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="language-tabs-wrapper">
                <div class="t-header">Список перекладів</div>

                <ul class="nav nav-tabs" role="tablist">
                    @forelse($landing_page->translating as $trans_item)
                        <li class="nav-item " role="presentation">
                            <a class="nav-link @if ($loop->first) active @endif"
                               aria-controls="tr_tab_{!! $loop->index !!}"
                               href="#tr_tab_{!! $loop->index !!}" role="tab" data-toggle="tab" aria-selected="true">
                                {!! $trans_item->language->name !!}
                            </a></li>
                    @empty

                    @endforelse
                </ul>
                <div class="tab-content">
                    @forelse($landing_page->translating as $trans_item)
                        <div role="tabpanel" class="tab-pane fade @if ($loop->index==0) show active @endif"
                             id="tr_tab_{!!$loop->index!!}">
                            <div class=" translating_item_wrapper pt-4 pb-4">
                                <dl class="dl-horizontal">
                                    <dt>Заголовок</dt>
                                    <dd>{!!$trans_item->title!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Опис</dt>
                                    <dd>
                                        <div class="card">
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

        </div>
    </div>
 @endsection
