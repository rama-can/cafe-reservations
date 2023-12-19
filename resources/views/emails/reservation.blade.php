<x-mail::message>
**{{ $text }}** <br>
@if (isset($reason))
    {{ $reason }}
@endif

- Date		: {{ $date }}
- Time		: {{ $time }}
- Category	: {{ $category }}

Thanks,<br>
{{ $getTheme['site_name'] }}
</x-mail::message>
