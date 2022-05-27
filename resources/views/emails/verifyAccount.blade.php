@component('mail::message')
# Welcome {{ $message}}

Drophut, Where we provide different type of Drone <br>
We are plead to save you best of ouir service. <br>


Please Kindly verify your account by clicking the verify button below <br>


@component('mail::button', ['url' => 'localhost:8000/verifyaccount'])
Verify your Account
@endcomponent

If you're having difficult in verify your account,<br>
Please copy the link below and paste it on your browser address <br>
http://www.localhost:8000/verifyaccount

Thanks {{$message}},<br>
{{ config('app.name') }}
@endcomponent
