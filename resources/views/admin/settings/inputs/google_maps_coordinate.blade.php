
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Значення', ['class' => ' control-label']) !!}
    <div class="">



        {!! Form::text('value', null, ['class' => 'form-control _input_map_value ','readonly'=>'readonly' ,'autocomplete'=>'off' ]) !!}
        <div id="inputMapWidget" style="height: 400px"></div>


        {!! $errors->first('value', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


@push('scripts')
<script>
    function initInputWidget() {
        var updateTimer;
        var inputValue =  {lat: 0, lng: 0 ,zoom :5 };

        try {
            var tempValue = JSON.parse({!! json_encode($setting->value);!!})
            if (tempValue instanceof Object){
                if (tempValue.lat){
                    inputValue.lat = tempValue.lat ;
                }
                if (tempValue.lng){
                    inputValue.lng = tempValue.lng;
                }
                if (tempValue.zoom){
                    inputValue.zoom = tempValue.zoom;
                }
            }
        }catch (e) {

        }
        // The map, centered at Uluru
        var inputMap = new google.maps.Map(
            document.getElementById('inputMapWidget'), {zoom: inputValue.zoom, center: {lat:inputValue.lat,lng:inputValue.lng}});
        var marker = new google.maps.Marker({
                position: {lat:inputValue.lat,lng:inputValue.lng},
                map: inputMap
               // ,draggable: true
            });



        google.maps.event.addListener(inputMap, 'zoom_changed', function() {
            updatePosition();
        });

        google.maps.event.addListener(inputMap, 'center_changed', function() {

            marker.setPosition(inputMap.getCenter())
            updatePosition();
            console.log('center_changed');
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            inputMap.panTo(marker.getPosition());
            updatePosition()
        });
        function updatePosition() {
            clearTimeout(updateTimer);
            updateTimer =  setTimeout(function () {
                var markerPosition =  marker.getPosition();
                inputValue.lat = markerPosition.lat();
                inputValue.lng = markerPosition.lng();
                inputValue.zoom = inputMap.getZoom();
                $('._input_map_value').val( JSON.stringify(inputValue)) ;
            },200)

        }

    }

</script>

<script  src="https://maps.googleapis.com/maps/api/js?key={{config('site.google_maps_api_key')}}&callback=initInputWidget" type="text/javascript">

</script>
    @endpush
