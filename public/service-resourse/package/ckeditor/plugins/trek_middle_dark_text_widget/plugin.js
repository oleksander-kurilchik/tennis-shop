//Веб студія Трек. Автор:marginal
//Звичайно треба було створити один віджет і в ньому за допомогою класів міняти розмір і колір, но мені впадло :)
CKEDITOR.plugins.add( 'trek_middle_dark_text_widget', {
    requires: 'widget',
    icons: 'trek_middle_dark_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_middle_dark_text_widget', {
            // Widget code.
            dialog: 'trek_middle_dark_text_widget_dialog',
             button: 'Створити середній темний текст',
            template:'<span class="landing-item_middle-dark-text" > Content </span>',
            toolbar: 'insert,10006',
            inline:true,
            requiredContent: 'span(landing-item_middle-dark-text)',
            // allowedContent: 'a[*]{*}',
            upcast: function( element ) {
                return element.name == 'span' && element.hasClass( 'landing-item_middle-dark-text' );
            },
            init: function () {
                var content = this.element.getHtml( );
                this.setData('content', content);
            },
            data: function () {
                this.element.setHtml(this.data.content);
            }
        } );

        CKEDITOR.dialog.add( 'trek_middle_dark_text_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});