<tr>

    <td>{{$service->name}}</td>
    <td>{{$service->title}}</td>
    <td>{!!  $service->statusText!!}</td>
    <td>{!!  $service->price!!} {{$service->order->currency->code}}</td>
    @foreach($service->prices as $price)
        <td>
            {{$price->price}} {{$price->currency->code}}
        </td>
    @endforeach

    @if($order->canEdit())
        <td>
        <a class="btn btn-primary btn-sm" href="{{route("admin.orders_services.edit",["id"=>$service->id])}}">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
        {!! Form::open([
                 'method'=>'DELETE',
                 'url' => route("admin.orders_services.delete",["id"=>$service->id]),
                 'style' => 'display:inline'
             ]) !!}
        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-sm',
                'title' => 'Видалити послугу',
                'onclick'=>'return confirm("Підтвердити видалення?")'
        )) !!}
        {!! Form::close() !!}
        </td>
    @endif
</tr>
