@if ( $bag->any() )
    <div class="admin-translate-message">
        @if ($bag->any())
            <ul class="alert alert-danger">
                @foreach ($bag->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif