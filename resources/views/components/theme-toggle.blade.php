@props([
    'align' => 'right'
])
<div class="relative inline-flex" x-data="{ open: false, darkMode: '', svgMode: 'false' }" x-init="darkMode = localStorage.getItem('darkMode') || 'false'; svgMode = darkMode">
    <div>
        <button
            class="flex items-center justify-center cursor-pointer w-8 h-8 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
            :class="{ 'bg-gray-100 text-gray-500': open }"
            aria-haspopup="true"
            @click="open = !open"
            :aria-expanded="open"
            x-cloak
        >
            <span class="sr-only">Menu</span>
            {{-- Light --}}
            <x-tabler-sun-filled x-show="svgMode === 'false'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
            {{-- Dark --}}
            <x-tabler-moon-stars x-show="svgMode === 'true'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
            {{-- System --}}
            <x-tabler-device-desktop x-show="svgMode === 'system'" class="w-5 h-5 text-gray-500 dark:text-gray-400"/>
        </button>
        <div
            class="origin-top-right z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}"
            @click.outside="open = false"
            @keydown.escape.window="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-200 transform"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-out duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
        >
            <ul>
                <li class="font-medium text-sm hover:bg-indigo-50 dark:text-slate-300 dark:hover:text-slate-200 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('false'); open = false; svgMode = 'false';"
                x-bind:class="svgMode === 'false' ? 'text-indigo-500' : ''">
                    <x-tabler-sun-filled class="w-5 h-5 mr-2" />
                    Light
                </li>
                <li class="font-medium text-sm hover:bg-indigo-50 text-gray-600 hover:text-gray-700 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('true'); open = false; svgMode = 'true';"
                x-bind:class="svgMode === 'true' ? 'text-indigo-500 dark:hover:text-indigo-400' : 'dark:text-slate-300 dark:hover:text-slate-100'"
                ><x-tabler-moon-stars class="w-5 h-5 mr-2"/>
                    Dark
                </li>
                <li class="font-medium text-sm hover:bg-indigo-50 text-gray-600 hover:text-gray-700 dark:hover:text-slate-100 dark:hover:bg-slate-700 flex items-center py-1 px-3 cursor-pointer"
                @click="selectMode('system'); open = false; svgMode = 'system';"
                x-bind:class="svgMode === 'system' ? 'text-indigo-500' : 'dark:text-slate-300 dark:hover:text-indigo-400'"
                ><x-tabler-device-desktop class="w-5 h-5 mr-2"/>
                    System
                </li>
            </ul>
        </div>
    </div>

    <script>
        function setMode(value) {
            if (value === 'system') {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else {
                document.documentElement.classList.toggle('dark', value === 'true');
            }
        }

        function selectMode(value) {
            localStorage.setItem('darkMode', value);
            setMode(value);
        }

        setMode(localStorage.getItem('darkMode') || 'false');
    </script>
</div>
