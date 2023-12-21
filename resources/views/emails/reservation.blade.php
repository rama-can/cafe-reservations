<x-mail::message>
**{{ $text }}** <br>
@if (isset($reason))
    {{ $reason }}
@endif

- Date		: {{ $date }}
- Time		: {{ $time }}
- Category	: {{ $category }}

@if (isset($footer))
{{ Illuminate\Mail\Markdown::parse($footer) }}
@endif

Thanks,<br>
{{ $getTheme['site_name'] }}
</x-mail::message>
