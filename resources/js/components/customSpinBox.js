(function ($) {
    $.fn.customSpin = function (options) {
        if (options == null || options == undefined) {
            options = {};
        }
        var settings = $.extend(
            {
                min: -1000,
                max: 1000,
                classWrap: "custom_counter"
            }
            , options);


        return this.each(function () {
            let input = $(this);
            function clickUp(e) {
                let val = parseInt(input.val());
                if (!val) {
                    val = settings.min;
                }
                if (val >= settings.max) {
                    input.val(val);
                }
                else {
                    input.val(val + 1);
                }
            }
            function clickDown(e) {
                let val = parseInt(input.val());
                if (!val) {
                    val = settings.min;
                }
                if (val <= settings.min) {
                    input.val(val);
                }
                else {
                    input.val(val - 1);
                }
            }

            let wrap = $("<div/>");
            wrap.addClass("b-site-spinbox   ");
            wrap.addClass(settings.classWrap);
            input.wrap(wrap);
            input.addClass("b-site-spinbox__input");
            input.prop('readonly', true);
            wrap = input.parent();

            let controlsDown = $(`<button type="button" class="b-site-spinbox__quantity-button b-site-spinbox__quantity-down"   >

               </button>
         `);
            let controlsUp = $(`<button class="b-site-spinbox__quantity-button b-site-spinbox__quantity-up"   >

                </button>`);

            input.keyup(function (e) {
                let value = input.val().replace(/\D/g, '');
                if (!value || value < settings.min) {
                    value = settings.min;
                }
                input.val(value)
            })
            input.before(controlsDown);
            input.after(controlsUp);
            wrap.find(".b-site-spinbox__quantity-up").click(clickUp);
            wrap.find(".b-site-spinbox__quantity-down").click(clickDown);
        });


    };
})(jQuery);
