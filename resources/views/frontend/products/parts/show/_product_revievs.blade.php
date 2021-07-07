<div id="product_reviews_block">
    <products-reviews></products-reviews>
</div>


@push('scripts_list1')
    <script>
        $('document').ready(function (){
            $('.js-b-product-reviews__show-form').click(function (){
                $('.b-product-reviews__form').removeClass('b-product-reviews__form_hidden')
                $('.b-product-reviews').addClass('b-product-reviews_hidden')
            })

            $('.b-product-reviews__form-cancel').click(function (){
                    $('.b-product-reviews__form').addClass('b-product-reviews__form_hidden')
                $('.b-product-reviews').removeClass('b-product-reviews_hidden')
            })


        });
    </script>
@endpush
