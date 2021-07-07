@push('scripts_list')
@if($item->styles)
    <style>
        {!! $item->styles !!}
    </style>
@endif

@if($item->javascript)
    <script>
        try {
            {!! $item->javascript !!}
        }
        catch (e) {
            console.log("Error from js at landing page item #{{$item->id}}", e)
        }

    </script>
@endif

    @endpush