@component('mail::message')
# Introduction

som body contact our sites.
<p> Email : {{$data['email']}}</p>
<p> Name : <a href="mailto:{{$data['email']}}">{{$data['username']}}</a></p>
<p> Subject : {{$data['subject']}}</p>
<p> Message : {{$data['message']}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
