<x-mail::message>
# Hello Admin

You got a new email from {{ $data['name'] }} saying "{{ $data['message'] }}". Reply to them at {{ $data['email'] }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
