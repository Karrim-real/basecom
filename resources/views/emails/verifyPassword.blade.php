@component('mail::message')
Reset your password {{  $userInfo ? $userInfo['email'] : ''}}

Dear {{$userInfo['email']}},
You Have requested to verify your password <br>
Please Click Reset button to reset your password <br>


@component('mail::button', ['url' => config('app.url').'changepassword/'.$userInfo['token']])
Reset Your Password
@endcomponent

Thanks, {{$userInfo['email']}}<br>
{{ config('app.name') }}
@endcomponent
