@props(['disabled' => false, 'placeholder', 'icon'])

<div class="relative">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ($errors->has($attributes->get('name')) ? 'border-red-300 dark:border-red-400 dark:bg-slate-900 focus:border-red-500 dark:focus:border-red-500 focus:ring-red-500 dark:focus:ring-red-500 rounded-md shadow-sm pl-9' : 'px-2 py-2 text-sm border-slate-300 bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm pl-9'), 'placeholder' => strtolower($placeholder ?? '')]) !!}>
    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
        @svg('tabler-' . $icon, 'w-5 h-5 text-gray-400 shrink-0 ml-2 mr-3')
    </div>
</div>
