@component('mail::message')
Contact Request From {{$messages['name']}}
Details of Sender <br>
Name : {{$messages['name']}}
Email : {{$messages['email']}}

Message of the Contact
Meesage : {{$messages['message']}}


@component('mail::button', ['url' => ''])
From Drophut
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
