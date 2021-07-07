@extends('layouts.backend')


@section("sub_title") - Фільтри  @endsection
@section('content')
    <?php
    use Carbon\Carbon;
    ?>

    <div class="card">
        <div class="card-header">Фільтри</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.filters.create") }}" class="btn btn-success btn-sm" title="">
                    <i class="fa fa-plus" aria-hidden="true"></i> Створити фільтр
                </a>

                <div>

                    {!! Form::open(['method' => 'GET', 'url' =>  route("admin.filters.index") , 'class' => 'form-group pb4 pt-4', 'role' => 'category'])  !!}
                    <div class="input-group">
                        <select class="form-control" name="category" onchange="form.submit()">
                            <option @if(Request::get('category')==null) selected @endif  autocomplete="off" value="">
                                Всі фільтри
                            </option>
                            @foreach($categories as $item)
                                <option value="{{$item->id}}"
                                        @if(Request::get('category')==$item->id) selected="selected"
                                        @endif   autocomplete="off">
                                     @for($i = 0 ; $i < $item->depth ; $i++) --  @endfor
                                    {!!$item->name!!}
                                </option>
                            @endforeach

                        </select>

                    </div>
                    <div class="pt-3">
                        @include("admin.global.search_input")
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            @include("admin.global.message_block")

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Назва')</th>
                        <th> Категория </th>
                        <th>@sortablelink('published', 'Опубліковано')</th>
                        <th>@sortablelink('order', 'Сортування')</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filters as $item)
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td style="font-size: 12px">
                                <div style="max-width: 100px">{{ $item->name }}</div>
                            </td>
                            <td style="font-size: 12px">
                               @if($item->category)
                                   {{$item->category->level_name}}
                               @endif
                            </td>
                            <td>

                                 @if($item->published == true )
                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                @else
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>

                                @endif

                            </td>

                            <td>
                                <div class="order-field-wrap">
                                    {!! Form::open([
                                   'method' => 'POST',
                                   'url' => route("admin.filters.order",["id"=>$item->id]),
                                   'style' => 'display:inline',
                                    'class'=>"form-ajax-submit",
                                   "autocomplete"=>"off"

                               ]) !!}
                                    {!! Form::number('order', $item->order, ['class' => 'form-control order-input pr-0' ,"style"=>"width:53px","onChange"=>"$(this).closest('form').submit()"]) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>

                            <td style="min-width: 130px">
                                <a href="{{route("admin.filters.show",["id"=>$item->id])}}" title="Перегляд">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ route("admin.filters.edit",["id"=>$item->id]) }}" title="Редагувати">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                              aria-hidden="true"></i></button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route("admin.filters.delete",["id"=>$item->id]),
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Видалити фільтр',
                                        'onclick'=>'return confirm("Підтвердити видалення?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $filters->appends( Request::except(["page","_token"]))->render() !!} </div>

            </div>

        </div>
    </div>


@endsection

@push("scripts")

@endpush
