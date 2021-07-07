@if (session()->has('flash_user_message_success'))

@push('scripts_list')
    <script>
        $(document).ready(function (){
            $.openModalNotyfy(@json(session('flash_user_message_success')),"")
        });
    </script>
@endpush

@endif
