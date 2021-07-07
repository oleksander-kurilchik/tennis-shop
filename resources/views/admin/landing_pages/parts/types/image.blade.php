<div class="form-group {{$bag->has('value')?' has-error':''}}">
    {!! Form::label('value', 'Зображення', ['class' => 'control-label ']) !!}
    <div class="input-group">
        <input type="text" class="form-control" id="lfmii_paralax_{{$item->id}}"
               name="value" value="{{old($old_prefix.".value",$item->value)}}" autocomplete="off"  >
        {!! $bag->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
        <div class="input-group-append">
            <button class="btn btn-outline-secondary laravel_filemanager_input_image_paralax" type="button"
                    data-input="lfmii_paralax_{{$item->id}}"
                    data-preview="lfmi_paralax_preview_{{$item->id}}">Вибрати зображення
            </button>
        </div>
    </div>
    <div id="lfmi_paralax_preview_{{$item->id}}" style="margin-top:15px;max-height:150px;">
        @if($item->value)
            <img class="img-fluid" src="{{$item->value}}" alt="" style="max-height: 150px">
        @endif
    </div>
</div>
