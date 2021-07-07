CKEDITOR.dialog.add('trek_site_link_widget_dialog', function (editor) {
    return {
        title: 'Властивости блока "Кнопка"',
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
                    },
                    {
                        type: 'text',
                        id: 'href',
                        label: 'Посилання',
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.href);
                        },
                        commit: function (widget) {
                            widget.setData('href', this.getValue());
                            console.log(" widget.setData('href', this.getValue());", this.getValue());
                        }
                    },


                ]
            }
        ]


    };
});