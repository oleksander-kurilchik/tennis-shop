//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_middle_white_text_widget', {
    requires: 'widget',
    icons: 'trek_middle_white_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_middle_white_text_widget', {
            // Widget code.
            dialog: 'trek_middle_white_text_widget_dialog',
             button: 'Створити середній білий текст',
            template:'<span class="landing-item_middle-white-text" > Content </span>',
            toolbar: 'insert,10003',
            inline:true,
            requiredContent: 'span(landing-item_middle-white-text)',
            // allowedContent: 'a[*]{*}',
            upcast: function( element ) {
                return element.name == 'span' && element.hasClass( 'landing-item_middle-white-text' );
            },
            init: function () {
                var content = this.element.getHtml( );
                this.setData('content', content);
            },
            data: function () {
                this.element.setHtml(this.data.content);
            }
        } );

        CKEDITOR.dialog.add( 'trek_middle_white_text_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});