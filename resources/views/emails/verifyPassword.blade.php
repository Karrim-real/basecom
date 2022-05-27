@component('mail::message')
Reset your password {{$user->name}}

You Have requested to verify your password <br>
Please Click Reset button to reset your password <br>


@component('mail::button', ['url' => 'localhost:8000/changepassword'. $user->VerifyAcc->token])
Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
