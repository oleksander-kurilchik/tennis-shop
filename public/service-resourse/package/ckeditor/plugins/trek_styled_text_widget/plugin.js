//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_styled_text_widget', {
    requires: 'widget',
    icons: 'trek_styled_text_widget',
    init: function( editor ) {



        editor.widgets.add( 'trek_styled_text_widget', {
            // Widget code.
            dialog: 'trek_styled_text_widget_dialog',
             button: 'Створити кнопку-ссилку',
            template:'<a class="btn site-link_button" href="/"> Content </a>',
            // editables: {
            //
            //     content: {
            //         selector: '.site-link_button',
            //         // allowedContent: 'p br ul ol li strong em'
            //     }
            // },
            toolbar: 'insert,10000',
            requiredContent: 'a(site-link_button)',
            // allowedContent: 'a[*]{*}',
            upcast: function( element ) {
                return element.name == 'a' && element.hasClass( 'site-link_button' );
            },

            init: function () {

                var content = this.element.getHtml( );
                this.setData('content', content);
                var href = this.element.getAttribute('href');
                this.setData('href', href);
            },
            data: function () {
                console.log("this.element.setAttribute('href',this.data.href)",this.data.href)
                this.element.setHtml(this.data.content);
                this.element.setAttribute('href',this.data.href);

                console.log("this.element.setAttribute('href',this.data.href)",this.data.href)

            }
        } );

        CKEDITOR.dialog.add( 'trek_site_link_widget_dialog', this.path + 'dialogs/dialog.js' );

    }
});