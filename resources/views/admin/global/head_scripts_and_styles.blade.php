

<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link href="{{ asset('/service-resourse/package/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
{!! Html::style('/service-resourse/css/app.css?v=00000')!!}

<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            "imageUploadUrl"=>route("admin.downloaded_files.storeCkeditor"),
            'backend_user'=>Auth::guard('backend')->check()?Auth::guard('backend')->user()->email:''

        ]) !!};
</script>
<script type="text/javascript" src="{{ asset('/service-resourse/js/jquery-3.4.0.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/service-resourse/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{ asset('/service-resourse/js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/service-resourse/package/bootstrap/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/service-resourse/package/bootstrap/js/bootstrap.min.js')}}"></script>

{!! Html::style('/service-resourse/package/datetimepicker/build/jquery.datetimepicker.min.css')!!}
{!! Html::script("/service-resourse/package/datetimepicker/build/jquery.datetimepicker.full.min.js") !!}
{!! Html::script('/service-resourse/package/jquery-mask/jquery.mask.min.js') !!}
<link href="/service-resourse/package/select2/dist/css/select2.min.css" rel="stylesheet"/>
<script src="/service-resourse/package/select2/dist/js/select2.min.js"></script>
<script src="/service-resourse/package/select2/dist/js/i18n/ru.js"></script>

<script src="/service-resourse/package/inputmask/dist/inputmask/inputmask.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/inputmask.extensions.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/inputmask.numeric.extensions.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/jquery.inputmask.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/phone-codes/phone.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/phone-codes/phone-be.js"></script>
<script src="/service-resourse/package/inputmask/dist/inputmask/phone-codes/phone-ru.js"></script>
{!! Html::script("/service-resourse/package/ckeditor/ckeditor.js") !!}
{!! Html::script("/service-resourse/package/ckeditor/adapters/jquery.js") !!}

{!! Html::script("/service-resourse/package/lightbox2/js/lightbox.min.js") !!}
{!! Html::style("/service-resourse/package/lightbox2/css/lightbox.min.css?v=1.0") !!}


{!! Html::script("/service-resourse/package/toastr/build/toastr.min.js") !!}
{!! Html::style("/service-resourse/package/toastr/build/toastr.min.css") !!}

{!! Html::script("/service-resourse/package/jquery-ui/jquery-ui.min.js") !!}
{!! Html::style("/service-resourse/package/jquery-ui/jquery-ui.css") !!}
{!! Html::style("/service-resourse/package/jquery-ui/jquery-ui.theme.css") !!}


{!! Html::style("/service-resourse/package/jquery-wheelcolorpicker/css/wheelcolorpicker.css") !!}
{!! Html::script("/service-resourse/package/jquery-wheelcolorpicker/jquery.wheelcolorpicker.js") !!}
<script type="text/javascript" src="{{ asset('/service-resourse/js/adminPanelPlugin.js')}}"></script>
<script type="text/javascript" src="{{ asset('/service-resourse/js/adminSlickPlugin.js')}}"></script>


{!! Html::script("/service-resourse/package/jsonform-jsonform_b4/deps/underscore.js") !!}
{!! Html::script("/service-resourse/package/jsonform-jsonform_b4/lib/jsonform.js") !!}
{!! Html::script("/service-resourse/package/jsonform-jsonform_b4/custom/customElements.js") !!}

{!! Html::script("/service-resourse/package/nestable2/jquery.nestable.js") !!}
{!! Html::style("/service-resourse/package/nestable2/jquery.nestable.css") !!}


@stack('admin_head_style')
@stack('admin_head_scripts')
<script type="text/javascript" src="{{ asset('/service-resourse/js/app.js')}}"></script>

{{--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">--}}

