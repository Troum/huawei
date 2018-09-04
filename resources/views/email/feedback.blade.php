@component('mail::message')
    @component('mail::panel')
        E-mail: {{$contact}}
        <br>
        Текст сообщения: {{$content}}
    @endcomponent
@endcomponent
