CKEDITOR.dialog.add('trek_action_price_widget_dialog', function (editor) {
    return {
        title: 'Властивости блока ціна',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'main',
                label: 'Налаштування ',
                elements: [
                    {
                        id: 'type',
                        type: 'select',
                        label: 'Тип виджета',
                        items: [
                            ['Жовтий', 'yellow_price'],
                            ['Червоний', 'red_price'],
                            ['Зелений', 'green_price']
                        ],
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.type);
                        },
                        commit: function (widget) {
                            widget.setData('type', this.getValue());
                        }
                    }

                ]

            }
        ]


    };
});