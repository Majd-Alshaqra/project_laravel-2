<x-mail::message>
# Introduction

The body of your message {{$name}}
<x-mail::panel>
This is the panel {{$user->email}}
</x-mail::panel>
<x-mail::button :url="'http://127.0.0.1:8000/new/users'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
