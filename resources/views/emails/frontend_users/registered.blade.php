@component('mail::message')

    @component('mail::text', ['url' => ''])
# Зараеструвався новий користувач <br/> <br/>

 ### Дані:
- **id:**  {{$user->id}}
- **Користувач:**   {{$user->first_name}} {{$user->last_name}},
- **email:**  {{$user->email}},
- **Дата:**  {{\Carbon\Carbon::parse($user->created_at)->translatedFormat('H:i j F Y')}},
@endcomponent

@endcomponent
