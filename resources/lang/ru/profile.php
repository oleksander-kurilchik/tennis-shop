<?php
return [
    'menu' => [
        'info' => 'Информация',
        'wishlist' => 'избранное',
        'orders' => 'Закази',
        'logout' => 'Виход',
    ],


    'show' => [
        'title' => 'Персональные данные',
        'title_form' => 'Персональные данные',
        'phone' => 'Телефон:',
        'last_name' => 'Фамилия',
        'first_name' => 'Имя',
        'not_specified' => 'не указано',
        'edit' => 'редактировать',
        'change_password' => 'Изменить пароль',
    ],
    'edit' => [
        'title' => 'Личные данные',
        'form' => [

            'first_name' => [
                'title' => 'Имя*',
                'placeholder' => 'Имя',
            ],
            'last_name' => [
                'title' => 'Фамилия*',
                'placeholder' => 'Фамилия',
            ],
            'patronymic' => [
                'title' => 'Отчество*',
                'placeholder' => 'Отчество',
            ],
            'phone' => [
                'title' => 'Телефон*',
                'placeholder' => 'Телефон',
            ],
            'country' => [
                'title' => 'Страна*',
                'placeholder' => 'Страна',
            ],

            'city' => [
                'title' => 'Город*',
                'placeholder' => 'Город',
            ],
            'company' => [
                'title' => 'Название компании',
                'placeholder' => 'Название компании',
            ],

            'address' => [
                'title' => 'Адрес',
                'placeholder' => 'Адрес',
            ],

            'save' => 'Сохранить изменения',
            'cancel' => 'отмена'
        ],
        'data_changed' => 'Данные изменены!',


    ],
    'change-password' => [
        'title' => 'Изменение пароля',
        'form' => [
            'old_password' => [
                'title' => 'Старый пароль',
                'placeholder' => 'Введите старый пароль',
            ],
            'password' => [
                'title' => 'Новый пароль',
                'placeholder' => 'Введите новий пароль',
            ],
            'password_confirmation' => [
                'title' => 'Повторите новый пароль',
                'placeholder' => 'Повторите новый пароль',
            ],
            'update_password' => ' Обновить пароль',
            'cancel' => 'отмена'

        ],
        'password_changed' => 'Пароль изменен!'

    ],


    'orders' => [
        'title' => 'История заказов',
        'actual_orders' => 'Актуальные заказы',
        'complete_orders' => 'История заказов',
        'empty' => [
            'title' => 'Вы еще не делали заказов',
            'description' => 'Заказ появятся как только вы их сделаете',
        ]


    ],
    'order_item' => [
        'show' => 'скрыть',
        'hide' => 'развернуть',
        'payment_method' => 'Способ оплаты',
        'delivery_method' => 'Способ доставки',
        'total' => 'Всего',

    ],
    'wishlist' => [
        'empty' => [
            'title' => 'Избранное',
            'description' => 'Список товаров в выбранном пустой',
        ]
    ]


];
