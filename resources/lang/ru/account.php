<?php

return [
    'login'=>[
        'title'=>'Вход',
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
            'remember_password'=>'Запомнить пароль',
            'login'=>'Войти',

        ],
        'login_with_social'=>'Вход через соцсети',
        'login'=>'Войти',
        'register'=>'зарегистрироваться',


    ],



    'register'=>[
        'title'=>'Регистрация',
         'form'=>[
            'first_name'=>[
                'title'=>'Имя*',
                'placeholder'=>'Имя',
            ],
            'last_name'=>[
                'title'=>'Фамилия*',
                'placeholder'=>'Фамилия',
            ],
            'patronymic'=>[
                'title'=>'Отчество*',
                'placeholder'=>'Отчество',
            ],
            'phone'=>[
                'title'=>'Телефон*',
                'placeholder'=>'Телефон',
            ],
            'country'=>[
                'title'=>'Страна*',
                'placeholder'=>'Страна',
                'default_option'=>"Выберите страну"
            ],
            'regions'=>[
                'title'=>'Область*',
                'placeholder'=>'Область',
                'default_option'=>"Выберите область"
            ],
            'city'=>[
                'title'=>'Город*',
                'placeholder'=>'Город',
            ],
            'company'=>[
                'title'=>'Название компании',
                'placeholder'=>'Название компании',
            ],
            'stores_number'=>[
                'title'=>'Количество магазинов',
                'placeholder'=>'Количество магазинов',
            ],
            'address'=>[
                'title'=>'Адрес',
                'placeholder'=>'Адрес',
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
                'title'=>'Подтверждение пароля*',
                'placeholder'=>'Подтверждение пароля',
            ],

            'register'=>'Зарегистрироваться',
             'rules'=>['title'=>'Согласен с','link'=>'правилами сайта'],
        ],
        'login_with_social'=>'Вход через соцсети',
        'login'=>'Войти',
        'register'=>'зарегистрироваться',







    ],

    'password' => [
        'reset' => [
            'title' => 'Восстановление пароля',
            'description'=> 'На данной странице вы можете восстановить пароль',

            'email'=>[
                'title'=>'Email',
                'placeholder'=>'Введите email',
            ],
            'submit'=>'Отправить на email',
            'back'=>'вернуться',
        ],

        'reset-link' => [
            'title' => 'Установить новый пароль',
            'description'=> 'На данной странице вы можете установить новый пароль',

            'email'=>[
                'title'=>'Email',
                'placeholder'=>'Введите email',
            ],
            'password'=>[
                'title'=>'Новый пароль',
                'placeholder'=>'Введите новый пароль',
            ],
            'password_confirmation'=>[
                'title'=>'Повторите новый пароль',
                'placeholder'=>'Повторите новый пароль',
            ],
            'submit'=>'Установить пароль'
        ],
    ],



];


