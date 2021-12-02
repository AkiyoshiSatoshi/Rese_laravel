{{-- @component('mail::message') --}}
# Introduction

The body of your message.
<p>done :: test</p>
<p>{{ $mail }}</p>

{{-- @component('mail::button', ['url' => '']) --}}
Button Text
{{-- @endcomponent --}}

Thanks,<br>
{{-- {{ config('app.name') }} --}}
{{-- @endcomponent --}}
