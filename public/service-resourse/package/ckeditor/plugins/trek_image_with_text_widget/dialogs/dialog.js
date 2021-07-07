CKEDITOR.dialog.add('trek_image_with_text_widget_dialog', function (editor) {
    return {
        title: 'Властивости блока "Зображення з текстом"',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'main',
                label: 'Налаштування ',
                elements: [
                    {
                        type : 'text',
                        label : "Фон",
                        id : 'background',
                        setup: function (widget) {
                            this.setValue(widget.data.background);
                        },
                        commit : function( widget )
                        {
                            widget.setData('background', this.getValue());
                            console.log(' widget.setData(\'background\', this.getValue());','background', this.getValue())
                        }
                    },
                    {
                        type : 'button',
                        id : 'browse',
                        hidden : 'true',
                        filebrowser :
                            {
                                action : 'Browse',
                                target:  'main:background',
                                url: editor.config.filebrowserImageBrowseUrl || editor.config.filebrowserBrowseUrl
                            },
                        label : "Вибрати файл для фону"
                     },
                    {
                        id: 'type_text',
                        type: 'select',
                        label: 'Тип тексту',
                        items: [
                            ['Темний', 'dark'],
                            ['Білий', 'white'],
                         ],
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.type_text);
                        },
                        commit: function (widget) {
                            widget.setData('type_text', this.getValue());
                        }
                    }
                ]
            }
        ]


    };
});