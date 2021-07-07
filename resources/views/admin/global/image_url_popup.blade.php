<div class="modal fade imager-url" id="image-modal-url">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Адреса Зображення</h5>
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" id="image_modal_input_url" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>
{{--@push("scripts")  не включать пуш -  баг--}}
    <script>
        $(window).ready(function () {

            $('#image-modal-url').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                console.log(button,"For odin glory");
                var image_url = button.data('urlimage');
                var modal = $(this);
                modal.find('#image_modal_input_url').val(image_url);
            })
        })
    </script>
{{--@endpush--}}