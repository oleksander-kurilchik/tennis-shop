@if (Session::has('flash_message') ||Session::has('flash_warning') || $errors->any()
 ||$errors->getBag('additional_products')->any())
    <div class="admin-header-message">
        @if (Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                {{ Session::get('flash_message') }}
            </div>
        @endif


        @if (Session::has('flash_warning'))
            <div class="alert alert-warning ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                {{ Session::get('flash_warning') }}
            </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


        @if ($errors->getBag('additional_products')->any())
            <ul class="alert alert-danger">
                @foreach ($errors->getBag('additional_products')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif