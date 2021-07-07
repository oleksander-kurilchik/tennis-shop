
<div class="table table-striped">
    <table class="table table-borderless">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $setting->id }}</td>
        </tr>
        <tr>
            <th>Назва</th>
            <td> {{ $setting->name }} </td>
        </tr>
        <tr>
            <th> Ключ</th>
            <td> {{ $setting->key }} </td>
        </tr>
        <tr>
            <th> Мова</th>
            <td>
                @if($setting->languages_id) {{$setting->languages_id}}  @else Мультимовне  @endif

            </td>
        </tr>

        <tr>
            <th> Група</th>
            <td> {{ $setting->settingsGroup->name }} </td>
        </tr>

        <tr>
            <th> Правила валідації</th>
            <td> {{ $setting->validation_rules }} </td>
        </tr>
        @if($setting->comment)
            <tr>
                <th> Коментар</th>
                <td> {{ $setting->comment }} </td>
            </tr>
        @endif

        </tbody>
    </table>
</div>






@switch($setting->input_type)
    @case('ckeditor')
    @include('admin.settings.inputs.ckeditor',['setting'=>$setting])
    @break
    @case('laravel_file_manager_image')
    @include('admin.settings.inputs.laravel_file_manager_image',['setting'=>$setting])
    @break
    @case('textarea')
    @include('admin.settings.inputs.textarea',['setting'=>$setting])
    @break
    @case('text')
    @include('admin.settings.inputs.text',['setting'=>$setting])
    @break
    @case('number')
    @include('admin.settings.inputs.number',['setting'=>$setting])
    @break
    @case('google_maps_coordinate')
    @include('admin.settings.inputs.google_maps_coordinate',['setting'=>$setting])
    @break
    @case('json_form_to_json')
    @include('admin.settings.inputs.json_form_to_json',['setting'=>$setting])
    @break
    @default
    @include('admin.settings.inputs.text',['setting'=>$setting])
    @break
@endswitch

<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(  'Зберегти', ['class' => 'btn btn-primary']) !!}
    </div>
</div>




