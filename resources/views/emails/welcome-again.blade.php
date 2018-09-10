@component('mail::message')
# Introduction

The body of your message.

- one
- two
- three

@component('mail::button', ['url' => 'http://www.tallymusic.net'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Inspirational quotes galore, and more, like poems, and roam...ings.
@endcomponent

// mail::table is also available!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
