@props(['options', 'name', 'id', 'selectedValue', 'placeholder'])
<select
    id="{{ $id }}"
    name="{{ $name }}"
    multiple=""
    placeholder="{{ $placeholder }}"
    autocomplete="off"
    class="block w-full rounded-sm cursor-pointer focus:outline-none"
>
@foreach($options as $value => $label)
    <option value="{{ $value }}" @if(in_array($value, $selectedValue)) selected @endif>{{ $label }}</option>
@endforeach
</select>

@push('scripts')>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
new TomSelect('#{{ $id }}', {
    maxItems: 3,
    plugins: ['remove_button'],
});
</script>

@endpush
