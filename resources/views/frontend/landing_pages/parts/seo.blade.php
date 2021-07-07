@section('seo_title') {{$page->front->seo_title}}   @stop
@section('seo_description')  {{$page->front->seo_description}}@stop
@section('seo_keywords')  {{$page->front->seo_keywords}}@stop

@push("head")
    {!! $page->front->openGraph !!}
    {!! $page->front->schemaOrg !!}

@endpush
