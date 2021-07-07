<tr>

    <td>{{$service->name}}</td>
    <td>{{$service->title}}</td>
    <td>{!!  $service->statusText!!}</td>
    <td>{!!  $service->price!!}</td>
    @foreach($service->prices as $price)
        <td>
            {{$price->price}} {{$price->currency->code}}
        </td>
    @endforeach
</tr>
