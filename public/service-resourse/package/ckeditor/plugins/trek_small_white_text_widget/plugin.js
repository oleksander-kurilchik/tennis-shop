//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_small_white_text_widget', {
    requires: 'widget',
    icons: 'trek_small_white_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_small_white_text_widget', {
            // Widget code.
            dialog: 'trek_small_white_text_widget_dialog',
             button: 'Створити малий білий текст',
            template:'<span class="landing-item_small-white-text" > Content </span>',
            toolbar: 'insert,10004',
            inline:true,
            requiredContent: 'span(landing-item_small-white-text)',
            // allowedContent: 'a[*]{*}',
            upcast: function( element ) {
                return element.name == 'span' && element.hasClass( 'landing-item_small-white-text' );
            },
            init: function () {
                var content = this.element.getHtml( );
                this.setData('content', content);
            },
            data: function () {
                this.element.setHtml(this.data.content);
            }
        } );

        CKEDITOR.dialog.add( 'trek_small_white_text_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});