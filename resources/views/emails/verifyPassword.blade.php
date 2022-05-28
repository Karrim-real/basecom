@component('mail::message')
Reset your password {{$userInfo['email']}}

Dear {{$userInfo['email']}},
You Have requested to verify your password <br>
Please Click Reset button to reset your password <br>


@component('mail::button', ['url' => 'http://www.localhost:8000/changepassword/_'.$userInfo['token']])
Reset Your Password
@endcomponent

Thanks, {{$userInfo['email']}}<br>
{{ config('app.name') }}
@endcomponent
