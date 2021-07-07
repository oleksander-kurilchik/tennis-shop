CKEDITOR.dialog.add( 'trek_action_price_item_dialog', function ( editor ) {
    return {
        title: 'Властивости блока ціна',
        minWidth: 400,
        minHeight: 200,
        contents:[
            {
                id: 'main',
                label:'Налаштування',
                elements: [
                    {
                        type: 'text',
                        id: 'title',
                        label: 'Title',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Abbreviation field cannot be empty." )
                        // setup: function( element ) {
                        //     this.setValue( element.getText() );
                        // },
                        //
                        // // Called by the main commitContent method call on dialog confirmation.
                        // commit: function( element ) {
                        //     element.setText( this.getValue() );
                        // }
                    },
                    {
                        type: 'text',
                        id: 'content',
                        label: 'Content',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Explanation field cannot be empty." )
                        // setup: function( element ) {
                        //     this.setValue( element.getText() );
                        // },
                        //
                        // // Called by the main commitContent method call on dialog confirmation.
                        // commit: function( element ) {
                        //     element.setText( this.getValue() );
                        // }
                    }
                ]

            }
        ],
        onOk: function() {
            var dialog = this;
            var container = editor.document.createElement( 'div' );
            container.setAttribute('class', 'action-price_item red_price');
             var title =   dialog.getValueOf( 'main', 'title' ) ;
             var content =   dialog.getValueOf( 'main', 'content' ) ;
            container.appendHtml('<div class="header">'+title+'</div><div class="text">'+content+'</div>');
            console.log('container',container);
            editor.insertElement( container );
        },
        onShow: function() {
            // The code that will be executed when a dialog window is loaded.
        },

    };
});