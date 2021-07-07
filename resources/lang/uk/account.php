<?php

return [
    'login'=>[
        'title'=>'Вхід',
         'form'=>[
            'email'=>[
              'title'=>'Email',
              'placeholder'=>'Email',
            ],
            'password'=>[
                'title'=>'Пароль',
                'title_forget'=>'Пароль',
                'placeholder'=>'Пароль',
            ],
            'remember_password'=>'Запам’ятати мене',
            'forget_password'=>'Забули пароль?',
            'login'=>'Увійти',


        ],
        'login_with_social'=>'Вхід через соцмережі',
        'login'=>'Увійти',
        'register'=>'зареєструватися',


    ],


    'register'=>[
        'title'=>'Реєстрація',
         'form'=>[
            'first_name'=>[
                'title'=>'ім’я*',
                'placeholder'=>'Ім’я',
            ],
            'last_name'=>[
                'title'=>'Прізвище*',
                'placeholder'=>'Прізвище',
            ],
            'patronymic'=>[
                'title'=>'по батькові*',
                'placeholder'=>'По батькові',
            ],
            'phone'=>[
                'title'=>'Телефон*',
                'placeholder'=>'Телефон',
            ],
            'country'=>[
                'title'=>'Країна*',
                'placeholder'=>'Країна',
                'default_option'=>"Виберіть країну"
            ],
            'regions'=>[
                'title'=>'Область*',
                'placeholder'=>'Область',
                'default_option'=>"Виберіть область"
            ],
            'city'=>[
                'title'=>'Місто*',
                'placeholder'=>'Місто',
            ],
            'company'=>[
                'title'=>'Назва компанії',
                'placeholder'=>'Назва компанії',
            ],
            'stores_number'=>[
                'title'=>'Кількість магазинів',
                'placeholder'=>'Кількість магазинів',
            ],
            'address'=>[
                'title'=>'Адреса',
                'placeholder'=>'Адреса',
            ],
            'email'=>[
                'title'=>'Email*',
                'placeholder'=>'Email',
            ],
            'password'=>[
                'title'=>'Пароль*',
                'placeholder'=>'Пароль',
            ],
            'password_confirmation'=>[
                'title'=>'підтвердження паролю*',
                'placeholder'=>'Підтвердження паролю',
            ],

            'register'=>'Зареєструватись',
             'rules'=>['title'=>'Погоджуюсь з','link'=>'правилами сайту'],

        ],
        'login_with_social'=>'Вхід через соцмережі',
        'login'=>'Увійти',
        'register'=>'зареєструватися',







    ],

    'password' => [
        'reset' => [
            'title' => 'Відновлення пароля',
            'description'=> 'На даній сторінці ви можете відновити пароль',

                'email'=>[
                    'title'=>'Email',
                    'placeholder'=>'Введіть email',
                ],
                'submit'=>'Відправити на email',
            'back'=>'Повернутися',

        ],

        'reset-link' => [
            'title' => 'Встановити новий пароль',
            'description'=> 'На даній сторінці ви можете встановити новий пароль',

            'email'=>[
                'title'=>'Email',
                'placeholder'=>'Введіть email',
            ],
            'password'=>[
                'title'=>'Новий пароль',
                'placeholder'=>'Введіть новий пароль',
            ],
            'password_confirmation'=>[
                'title'=>'Повторіть новий пароль',
                'placeholder'=>'Повторіть новий пароль',
            ],
            'submit'=>'Встановити пароль'
        ],
    ],



];


