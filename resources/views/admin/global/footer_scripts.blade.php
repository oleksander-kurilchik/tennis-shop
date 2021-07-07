
<script>
    window.axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest'
    };

    $(document).ready(function()
    {
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
        $('.nav-tabs a.nav-link').on('shown.bs.tab', function (e) {
            history.replaceState(null, null, e.target.hash);
        })
    });
</script>

<script>
    $(window).ready(function () {
        $("#button_toggle_sidebar").click(function () {
            $("#admin-content-wrap").toggleClass("hide-sidebar")
        });
    })
</script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>




<script>
    $(document).ready(function () {
        $(".input-form-ajax-submit").change(function (e) {
            e.preventDefault();

            console.log("ok google");
            window.axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest'
            };
            var form  =  $(this).closest("form") ;
            var  url = form.attr("action");
            var value = $(this).val();
            var formData =  form.serialize();

            axios.post(url, formData)
                .then(function (response) {

                    if (response.data.success == true) {

                        toastr.info(response.data.message);
                    }

                })
                .catch(function (error) {

                    console.log(error);
                    toastr.error('Сталась помилка');
                });
        });



        $(".form-ajax-submit").submit(function (e) {

            console.log("form-ajax-submit");
            e.preventDefault();
            window.axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest'
            };
            var form  =  $(this)  ;
            var  url = form.attr("action");
            var formData =  form.serialize();

            axios.post(url, formData)
                .then(function (response) {
                    if (response.data.success == true) {
                        toastr.info(response.data.message);
                    }
                })
                .catch(function (error) {
                    if (error.response && error.response.status == 422)
                    {
                        var errors = error.response.data.errors;
                        for (const prop in errors) {
                            if (errors.hasOwnProperty(prop)) {
                                if( Array.isArray(errors[prop]))
                                {
                                    var errorList = errors[prop];
                                    for(var _i = 0 ; _i <errorList.length ; _i++)
                                    {
                                        toastr.error(errorList[_i]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        toastr.error('Сталась помилка');
                    }
                    console.log(error);
                });
        });

        $(".true-false-and-submit").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).parent().find(".checkbox-value").attr('value', 1);
            } else {
                $(this).parent().find(".checkbox-value").attr('value', 0);
            }
            console.log("true-false-and-submit");
            $(this).closest("form").submit();

        });




    });


</script>
<script>

$(function () {
    $('.simple-ckeditor-replace').ckeditor(
        {
            customConfig : '/service-resourse/package/ckeditor/config_textarea.js'
        }
    );

})

$(document).ready(function () {
        $('.parallax-json').parallaxJson( );

        $('.slider-json').sliderJson();
    }
)
</script>

{{--<script>--}}
    {{--var route_prefix = "{{ url(config('lfm.url_prefix')) }}";--}}


    {{--$.fn.filemanager = function(type, options) {--}}
        {{--type = type || 'file';--}}

        {{--this.on('click', function(e) {--}}
            {{--var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';--}}
            {{--var target_input = $('#' + $(this).data('input'));--}}
            {{--var target_preview = $('#' + $(this).data('preview'));--}}
            {{--window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');--}}
            {{--window.SetUrl = function (items) {--}}
                {{--var file_path = items.map(function (item) {--}}
                    {{--return item.url;--}}
                {{--}).join(',');--}}

                {{--// set the value of the desired input to image url--}}
                {{--target_input.val('').val(file_path).trigger('change');--}}

                {{--// clear previous preview--}}
                {{--target_preview.html('');--}}

                {{--// set or change the preview image src--}}
                {{--items.forEach(function (item) {--}}
                    {{--target_preview.append(--}}
                        {{--$('<img>').css('height', '5rem').attr('src', item.thumb_url)--}}
                    {{--);--}}
                {{--});--}}

                {{--// trigger change event--}}
                {{--target_preview.trigger('change');--}}
            {{--};--}}
            {{--return false;--}}
        {{--});--}}
    {{--}--}}

{{--</script>--}}


@stack('admin_footer_style')
@stack('admin_footer_scripts')
