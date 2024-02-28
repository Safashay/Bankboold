@component('mail::message')
# Introduction

to:{{$data['Name']}}<br>
{{$data['Subject']}}<br>
{{$data['Message']}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
