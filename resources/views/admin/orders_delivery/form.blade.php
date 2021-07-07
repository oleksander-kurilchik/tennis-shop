<vue-delivery initdm="{{old('delivery_method' ,$delivery->delivery_method??0)}}"
              initcity="{{old('city_id',$delivery->city_id)}}"
              initwarehouse="{{old('warehouse_id',$delivery->warehouse_id)}}"  ></vue-delivery>
<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
