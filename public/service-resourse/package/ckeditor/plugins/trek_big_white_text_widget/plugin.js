//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_big_white_text_widget', {
    requires: 'widget',
    icons: 'trek_big_white_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_big_white_text_widget', {
            // Widget code.
            dialog: 'trek_big_white_text_widget_dialog',
             button: 'Створити великий білий текст',
            template:'<span class="landing-item_big-white-text" > Content </span>',
            toolbar: 'insert,10002',
            inline:true,
            requiredContent: 'span(landing-item_big-white-text)',
            // allowedContent: 'a[*]{*}',
            upcast: function( element ) {
                return element.name == 'span' && element.hasClass( 'landing-item_big-white-text' );
            },
            init: function () {
                var content = this.element.getHtml( );
                this.setData('content', content);
            },
            data: function () {
                this.element.setHtml(this.data.content);
            }
        } );

        CKEDITOR.dialog.add( 'trek_big_white_text_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});