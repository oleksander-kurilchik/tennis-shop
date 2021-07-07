CKEDITOR.dialog.add('trek_middle_dark_text_widget_dialog', function (editor) {
    return {
        title: 'Властивости блока "Середній темний текст"',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'main',
                label: 'Налаштування ',
                elements: [
                    {
                        type: 'text',
                        id: 'content',
                        label: 'Контент',
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.content);
                        },
                        commit: function (widget) {
                            widget.setData('content', this.getValue());
                        }
                    }
                ]
            }
        ]


    };
});