@component('mail::message')
# @lang('Hello!')

@lang('Your account logged in from a new device.', ['app' => 'Cresmanage Hub'])

> **@lang('Account:')** {{ $account->email }}<br/>
> **@lang('Time:')** {{ $time->toCookieString() }}<br/>
> **@lang('IP Address:')** {{ $ipAddress }}<br/>
> **@lang('Browser:')** {{ $browser }}<br/>
@if ($location && !$location['default'])
> **@lang('Location:')** {{ $location['city'] ?? __('Unknown City') }}, {{ $location['state'] ?? __('Unknown State') }}
@endif

@lang('If this was you, you can ignore this alert. If you suspect any suspicious activity on your account, please change your password.')
<br/>
@lang('Regards,')<br/>
Cresmanage Hub
@endcomponent