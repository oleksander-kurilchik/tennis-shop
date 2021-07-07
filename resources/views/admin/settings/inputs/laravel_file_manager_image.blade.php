{{--<span class="input-group-btn">--}}
{{--<a  class="laravel_filemanager_input_image" data-input="thumbnail_{{$setting->id}}" data-preview="holder_{{$setting->id}}" class="btn btn-primary text-white">--}}
{{--<i class="fa fa-picture-o"></i> Choose--}}
{{--</a>--}}
{{--</span>--}}
{{--<input id="thumbnail_{{$setting->id}}"  name="settings[{{$setting->key}}]" value="{{$setting->value}}">--}}
{{--<div id="holder_{{$setting->id}}" style="margin-top:15px;max-height:100px;"></div>--}}

<div class="form-group {{$errors->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Значення', ['class' => 'control-label ']) !!}
    <div class="w-100">
        <div class="laravel_filemanager_input_image-wrap pt-4 pb 4">

            <div class="input-group mb-3">
                <input type="text" class="form-control" id="laravel_file_manager_input_image_{{$setting->id}}"
                       name="value" value="{{$setting->value}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary laravel_filemanager_input_image" type="button"
                            data-input="laravel_file_manager_input_image_{{$setting->id}}"
                            data-preview="lfmi_preview_{{$setting->id}}">Вибрати зображення
                    </button>
                </div>
            </div>
            <div id="lfmi_preview_{{$setting->id}}" style="margin-top:15px;max-height:150px;">
                @if($setting->value)
                    <img class="img-fluid" src="{{$setting->value}}" alt="" style="max-height: 150px">
                @endif
            </div>

        </div>
        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>

@push('scripts')
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix')) }}";


        $.fn.filemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
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
                $('.laravel_filemanager_input_image').filemanager('image', {prefix: route_prefix});
                $('.laravel_filemanager_input_file').filemanager('file', {prefix: route_prefix});

            }
        )

    </script>
@endpush



