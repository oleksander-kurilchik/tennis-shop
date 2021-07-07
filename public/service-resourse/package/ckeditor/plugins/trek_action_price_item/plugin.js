//Веб студія Трек. Автор:marginal

CKEDITOR.plugins.add( 'trek_action_price_item', {
    icons: 'trek_action_price_item',
    init: function( editor ) {
        //Plugin logic goes here.
        // editor.addCommand( 'trek_action_price_item', {
        //     exec: function( editor ) {
        //          editor.insertHtml( '<div class="action-price_item red_price"><div class="header">Pikachy</div><div class="text">Go to walhala</div></div>' );
        //     }
        // });
        editor.addCommand( 'trek_action_price_item', new CKEDITOR.dialogCommand( 'trek_action_price_item_dialog' ) );


        editor.ui.addButton( 'trek_action_price_item', {
            label: 'Прайс блок',
            command: 'trek_action_price_item',
            toolbar: 'insert'
        });

        if ( editor.contextMenu ) {
            editor.addMenuGroup( 'tpiGroup' );
            editor.addMenuItem( 'tpiItem', {
                label: 'Редагувати блок ціни',
                icon: this.path + 'icons/trek_action_price_item.png',
                command: 'trek_action_price_item',
                group: 'tpiGroup'
            });
            editor.contextMenu.addListener( function( element ) {
                console.log('element- 1234 con',element);
                if (element.hasClass('action-price_item') || element.getParent().hasClass('action-price_item') ) {
                    return { tpiItem: CKEDITOR.TRISTATE_OFF };
                }
            });
        }


        CKEDITOR.dialog.add( 'trek_action_price_item_dialog', this.path + 'dialogs/trek_action_price_item.js' );

    }
});