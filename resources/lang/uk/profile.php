<?php
return [
    'menu' => [
        'info' => 'Інформація',
        'wishlist' => 'Обране',
        'orders' => 'Замовлення',
        'logout' => 'Вихід',
    ],


    'show' => [
        'title' => 'Персональні дані',
        'title_form' => 'Персональні дані',
        'phone' => 'Телефон:',
        'last_name' => 'Прізвище',
        'first_name' => 'Ім’я',
        'not_specified' => 'не вказано',
        'edit' => 'редагувати',
        'change_password' => 'Змінити пароль',
    ],
    'edit' => [
        'title' => 'Особисті дані',
        'form' => [
            'first_name' => [
                'title' => 'ім’я*',
                'placeholder' => 'Ім’я',
            ],
            'last_name' => [
                'title' => 'Прізвище*',
                'placeholder' => 'Прізвище',
            ],
            'patronymic' => [
                'title' => 'по батькові*',
                'placeholder' => 'По батькові',
            ],
            'phone' => [
                'title' => 'Телефон*',
                'placeholder' => 'Телефон',
            ],
            'country' => [
                'title' => 'Країна*',
                'placeholder' => 'Країна',
            ],

            'city' => [
                'title' => 'Місто*',
                'placeholder' => 'Місто',
            ],
            'company' => [
                'title' => 'Назва компанії',
                'placeholder' => 'Назва компанії',
            ],

            'address' => [
                'title' => 'Адреса',
                'placeholder' => 'Адреса',
            ],

            'save' => 'Зберегти зміни',
            'cancel' => 'скасувати'
        ],
        'data_changed' => 'Дані змінено!',


    ],
    'change-password' => [
        'title' => 'Зміна паролю',
        'form' => [
            'old_password' => [
                'title' => 'Старий пароль',
                'placeholder' => 'Введіть старий пароль',
            ],
            'password' => [
                'title' => 'Новий пароль',
                'placeholder' => 'Введіть новий пароль',
            ],
            'password_confirmation' => [
                'title' => 'Повторіть новий пароль',
                'placeholder' => 'Повторіть новий пароль',
            ],
            'update_password' => ' Оновити пароль',
            'cancel' => 'скасувати'

        ],
        'password_changed' => 'Пароль змінено!'

    ],


    'orders' => [
        'title' => 'Історія замовлень',
        'actual_orders' => 'Актуальні замовлення',
        'complete_orders' => 'Історія замовлень',
        'empty' => [
            'title' => 'Ви ще не робили замовлень',
            'description' => 'Замовлення з\'являться як тільки ви їх зробите',
        ]


    ],
    'order_item' => [
        'show' => 'приховати',
        'hide' => 'розгорнути',
        'payment_method' => 'Спосіб оплати',
        'delivery_method' => 'Спосіб доставки',
        'total' => 'Всього',

    ],
    'wishlist' => [
        'empty' => [
            'title' => 'Обране',
            'description' => 'Список товарів в обраному порожній',
        ]
    ]


];
