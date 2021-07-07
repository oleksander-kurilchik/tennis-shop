//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_action_price_widget', {
    requires: 'widget',
    icons: 'trek_action_price_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_action_price_widget', {
            // Widget code.
            dialog: 'trek_action_price_widget_dialog',
            // inline:true,
            button: 'Створити блок ціна',
            toolbar: 'insert,9999',
            template:'<div class="action-price_item  ">   <div class="header">title</div><div class="text">content</div></div>',
            editables: {
                title: {
                    selector: '.action-price_item .header',
                    // allowedContent: 'br strong em'
                },
                content: {
                    selector: '.action-price_item .text ',
                    // allowedContent: 'p br ul ol li strong em'
                }
            },
            requiredContent: 'div(action-price_item)',
            upcast: function( element ) {
                return element.name == 'div' && element.hasClass( 'action-price_item' );
            },

            init: function() {
                if ( this.element.hasClass( 'yellow_price' ) )
                    this.setData( 'type', 'yellow_price' );
                if ( this.element.hasClass( 'red_price' ) )
                    this.setData( 'type', 'red_price' );
                if ( this.element.hasClass( 'green_price' ) )
                    this.setData( 'type', 'green_price' );




            },
            data: function() {
                this.element.removeClass( 'yellow_price' );
                this.element.removeClass( 'red_price' );
                this.element.removeClass( 'green_price' );
                if ( this.data.type ) {
                    this.element.addClass(this.data.type);
                }
            }

        } );

        CKEDITOR.dialog.add( 'trek_action_price_widget_dialog', this.path + 'dialogs/trek_action_price_widget.js' );

    }
});