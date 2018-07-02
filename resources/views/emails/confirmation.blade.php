@component('mail::message')
# Hello {{$username}}
Thanks For Signing Up In {{ config('app.name') }} System
@component('mail::button', ['url' => $url])
confirm your email address
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
