



<div class="form-group {{ $errors->has('course') ? 'has-error' : ''}}">
    {!! Form::label('course', 'Курс відносно універсальної валюти', ['class' => ' control-label']) !!}
    <div class="">
        {!! Form::text('course',null, ['class' => 'form-control']) !!}
        {!! $errors->first('course', '<p class="invalid-feedback d-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="text-center pt-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>



<div class="snippet-output" data-id="snippet-events"></div>



<div class="table-responsive pt-5">
<table class="table table-sm table-striped">
    <thead>
    <tr>

        <th scope="col">Назва валюти</th>
        <th scope="col">курс</th>
        <th scope="col">Відносна валюта</th>
        <th scope="col">відносний курс валюти</th>
    </tr>
    </thead>
    <tbody>
    @foreach($currencies as $item)

        <tr>
            <th scope="row">{{$item->name}}</th>
            <td>{{$item->course}}</td>
            <td>{{$currency->name}}</td>
            <td> {{$item->course / $currency->course  }}</td>
        </tr>

    @endforeach
    </tbody>
</table>

</div>




