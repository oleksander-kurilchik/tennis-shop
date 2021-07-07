//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_image_with_text_widget', {
    requires: 'widget',
    icons: 'trek_image_with_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_image_with_text_widget', {
            // Widget code.
            dialog: 'trek_image_with_text_widget_dialog',
             button: 'Створити зображення  текстом',
            toolbar: 'insert,9998',
            template:'<div class="image-block-with-text"><img src="" class="image-block_image-background image-background"><div class="image-block-with-text_content-wrap"><div class="image-block-with-text_content ">Content</div> </div></div>',
            editables: {
                // title: {
                //     selector: '.action-price_item .header',
                //     // allowedContent: 'br strong em'
                // },
                content: {
                    selector: '.image-block-with-text .image-block-with-text_content ',
                     // allowedContent: 'p br strong em span a {*}(*); *[anchor]  ;*[link]   '
                }
            },
            requiredContent: 'div(action-price_item)',
            upcast: function( element ) {
                return element.name == 'div' && element.hasClass( 'image-block-with-text' );
            },

            init: function( ) {
                var background = '';
                var backgroundElement  = this.element.findOne('.image-background');
                if (backgroundElement){
                    background =   backgroundElement.getAttribute('src');
                }

                if (background){
                    this.setData( 'background', background );
                }


                if ( this.element.hasClass( 'white' ) )
                    this.setData( 'type_text', 'white' );
                if ( this.element.hasClass( 'dark' ) )
                    this.setData( 'type_text', 'dark' );



            },
            data: function() {
                if (this.data.background){
                    var backgroundElement  = this.element.findOne('.image-background');
                    if (backgroundElement){
                        backgroundElement.setAttribute('src',this.data.background);
                    }
                }

                this.element.removeClass( 'dark' );
                this.element.removeClass( 'white' );
                 if ( this.data.type_text ) {
                    this.element.addClass(this.data.type_text);
                }


            }

        } );

        CKEDITOR.dialog.add( 'trek_image_with_text_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});