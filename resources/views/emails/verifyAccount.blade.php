@component('mail::message')
# Welcome {{ $message['name']}}

Drophut, Where we provide different type of Drone <br>
We are plead to save you best of ouir service. <br>


Please Kindly verify your account by clicking the verify button below <br>
{{-- {{ dd(config('app.url'))}} --}}

@component('mail::button', ['url' => config('app.url').'verifyaccount/'.$message['token']])
Verify your Account
@endcomponent

If you're having difficult in verify your account,<br>
Please copy the link below and paste it on your browser address <br>
{{config('app.url')}}verifyaccount/{{$message['token']}}

Thanks {{$message['name']}},<br>
{{ config('app.name') }}
@endcomponent
