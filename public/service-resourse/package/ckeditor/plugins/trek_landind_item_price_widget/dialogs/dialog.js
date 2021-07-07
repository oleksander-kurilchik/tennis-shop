CKEDITOR.dialog.add('trek_landind_item_price_widget_dialog', function (editor) {
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
                        type: 'text',
                        id: 'price',
                        label: 'Ціна',
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.price);
                        },
                        commit: function (widget) {
                            widget.setData('price', this.getValue());
                        }
                    },
                    {
                        type: 'text',
                        id: 'currency',
                        label: 'Валюта',
                        validate: CKEDITOR.dialog.validate.notEmpty("Значення не може бути порожне"),
                        setup: function (widget) {
                            this.setValue(widget.data.currency);
                        },
                        commit: function (widget) {
                            widget.setData('currency', this.getValue());
                        }
                    }

                ]

            }
        ]


    };
});