@props(['action','submit', 'enctype' => ''])

<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
    </header>
    <x-section-border />
    <form action="{{ $action }}" method="POST" {{ $attributes->merge(['enctype' => $enctype]) }}>
        <div class="mt-6 grid grid-cols-6 gap-6 mb-2">
            {{ $form }}
        </div>
        <x-section-border />
        @if (isset($actions))
            <div class="flex items-center justify-end text-right mt-2">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>
