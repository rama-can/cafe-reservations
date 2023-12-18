@props(['options', 'name', 'id', 'selectedValue', 'placeholder'])
@php
    $selectedValue = $selectedValue ?? null;
@endphp
<select
    id="{{ $id }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    autocomplete="off"
    class="block w-full rounded-sm cursor-pointer focus:outline-none"
>
<option value="">Select a {{ $name }}</option>
@foreach($options as $value => $label)
<option value="{{ $value }}" {{ $value == $selectedValue ? 'selected' : '' }}>
    {{ $label }}
</option>
@endforeach
</select>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
new TomSelect('#{{ $id }}',{
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    }
});
</script>
@endpush
