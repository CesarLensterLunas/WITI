@component('mail::message')

Hello {{$user->name}},

Your account has been created successfully.

Default Password: Password123!!!

Please change your password immediately.

@component('mail::button', ['url' => url('', $user->remember_token)])
Confirm Email
@endcomponent

Thanks,<br>
Cresmanagehub
@endcomponent
