<div class="modal fade b-cart-add-modal b-site-modal-dialog" id="modalCartAdd" tabindex="-1" role="dialog"
     aria-labelledby="modalNotyfyLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg  modal-dialog-centered">
        <div class="modal-content b-cart-add-modal__content">
            <div class="modal-header">
                <button type="button" class="b-site-modal__close close" data-dismiss="modal" aria-label="Close">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5954 17.8684L17.8684 16.5954C18.0439 16.4199 18.0439 16.1347 17.8684 15.9592L10.9095 9.0003L17.8684 2.04139C18.0439 1.86588 18.0439 1.58067 17.8684 1.40521L16.5954 0.132183C16.4199 -0.0432738 16.1347 -0.0432738 15.9592 0.132183L9.0003 7.09109L2.04139 0.131634C1.86588 -0.043878 1.58067 -0.043878 1.40521 0.131634L0.131634 1.4046C-0.043878 1.58012 -0.043878 1.86533 0.131634 2.04084L7.09109 9.0003L0.131634 15.9592C-0.043878 16.1347 -0.043878 16.4199 0.131634 16.5954L1.4046 17.8684C1.58012 18.0439 1.86533 18.0439 2.04084 17.8684L9.0003 10.9095L15.9592 17.8684C16.1347 18.0439 16.4199 18.0439 16.5954 17.8684Z" fill="black"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body b-cart-add-modal__body ">
                <div class="b-cart-add-modal__message">

                </div>
            </div>
            <div class="modal-footer b-cart-add-modal__footer ">
                <div class="row w-100">
                    <div class="col-sm-6 py-2">
                        <button type="button" class="button-default w-100 b-cart-add-modal__footer-to-cart"
                                data-dismiss="modal">
                            <span>  @lang('modals.add_to_cart.dismiss_button')</span>
                        </button>
                    </div>
                    <div class="col-sm-6 py-2">
                        <a href="{{route('frontend.cart.index')}}"
                           class="button-default  w-100 b-cart-add-modal__footer-close">
                            <span> @lang('modals.add_to_cart.to_cart')</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
