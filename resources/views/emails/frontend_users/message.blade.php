@component('mail::message')

    @component('mail::text', ['url' => ''])
# Отримано нове повідомлення<br/> <br/>

 ### Дані:
- **id:**  {{$user_message->id}}
- **Користувач:**   {{$user->first_name}} {{$user->last_name}},
- **email:**  {{$user->email}},
- **Мова:**  {{$user_message->lang}},
- **Дата:**  {{\Carbon\Carbon::parse($user->created_at)->translatedFormat('H:i j F Y')}},
@endcomponent
    <div style="">
        {{$user_message->message}}
    </div>
@endcomponent
