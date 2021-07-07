//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_landind_item_price_widget', {
    requires: 'widget',
    icons: 'trek_landind_item_price_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_landind_item_price_widget', {
            // Widget code.
            dialog: 'trek_landind_item_price_widget_dialog',
            inline:true,
            button: 'Створити блок ціна',
            toolbar: 'insert,10001',
            template:'<span class="landing-page-item_price-block"><span class="landing-page-item_price-block_price"> ' +
                '00</span><span class="landing-page-item_price-block_currency"> 00</span></span> ',
            requiredContent: 'span(landing-page-item_price-block)',
            upcast: function( element ) {
                return element.name == 'span' && element.hasClass( 'landing-page-item_price-block' );
            },

            init: function() {
                var elementPrice = this.element.findOne('.landing-page-item_price-block_price')
                if (elementPrice){
                    var contentPrice = elementPrice.getHtml();
                    this.setData('price', contentPrice);
                }
                var elementCurrency = this.element.findOne('.landing-page-item_price-block_currency')
                if (elementCurrency){
                    var contentCurrency = elementCurrency.getHtml();
                    this.setData('currency', contentCurrency);
                }

            },
            data: function() {
                var elementPrice = this.element.findOne('.landing-page-item_price-block_price')
                if (elementPrice){
                   elementPrice.setHtml(this.data.price);

                }
                var elementCurrency = this.element.findOne('.landing-page-item_price-block_currency')
                if (elementCurrency){
                    elementCurrency.setHtml(this.data.currency);
                }
            }
        } );

        CKEDITOR.dialog.add( 'trek_landind_item_price_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});