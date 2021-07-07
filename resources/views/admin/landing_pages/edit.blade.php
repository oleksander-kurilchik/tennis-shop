@extends('layouts.backend')

@section("sub_title") - Лендинги  @endsection

@section('content')
        <div class="card admin-card">
            <div class="card-header admin-card__header">Редагувати лендинг #{{ $landing_page->id }} - "{{$landing_page->name}}"</div>
            <div class="card-body admin-card__body">
                <div class="header-admin-button pt-2 pb-4">
                    <a href="{{ route("admin.landing_pages.index") }}" title="Назад ">
                        <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Назад
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                <ul class="nav nav-tabs">
                    <li  class="nav-item " >
                        <a class="nav-link active"  role="tab" data-toggle="tab" href="#main_inf"
                             aria-controls="main_inf" aria-selected="true"
                        >Головна інформація</a>
                    </li>
                    <li class="nav-item ">
                        <a  class="nav-link"  role="tab" data-toggle="tab" href="#tab_translates"  aria-controls="main_inf" aria-selected="false">
                            Переклади</a>
                    </li>
                    <li class="nav-item ">
                        <a  class="nav-link"  role="tab" data-toggle="tab" href="#items_tab_block"  aria-controls="main_inf" aria-selected="false">
                            Блоки
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="main_inf" role="tabpanel"     class="tab-pane fade show active">
                        <br>
                        <br>
                        {!! Form::model($landing_page, [
                   'method' => 'PATCH',
                   'url' => route("admin.landing_pages.update",["id"=>$landing_page->id]),
                   'class' => 'form-horizontal form-admin',
                   'files' => true
               ]) !!}

                        @include ('admin.landing_pages.form', ['submitButtonText' => 'Оновити'])
                        {!! Form::close() !!}
                    </div>
                    @include("admin.landing_pages.translating_panel")
                    @include("admin.landing_pages.parts.items_tab_block")


                </div>
            </div>

@endsection


    @push('scripts')
        <script>
            var route_prefix = "{{ url(config('lfm.url_prefix')) }}";


            $.fn.filemanagerLPParalax = function (type, options) {
                type = type || 'file';

                this.on('click', function (e) {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    var target_input = $('#' + $(this).data('input'));
                    var target_preview = $('#' + $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (items) {
                        var file_path = items.map(function (item) {
                            return item.url;
                        }).join(',');

                        // set the value of the desired input to image url
                        target_input.val('').val(file_path).trigger('change');

                        // clear previous preview
                        target_preview.html('');

                        // set or change the preview image src
                        items.forEach(function (item) {
                            target_preview.append(
                                $('<img>').css('height', '5rem').attr('src', item.thumb_url)
                            );
                        });

                        // trigger change event
                        target_preview.trigger('change');
                    };
                    return false;
                });
            }


            $(document).ready(function () {
                    $('.laravel_filemanager_input_image_paralax').filemanagerLPParalax('image', {prefix: route_prefix});


                }
            )

        </script>
@endpush
