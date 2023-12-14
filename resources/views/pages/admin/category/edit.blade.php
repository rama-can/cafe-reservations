<x-admin-layout>@section('title'){{ __('Add Category') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl items-center mx-auto">
                    <section>
                    <x-form-section action="{{ route('admin.categories.update', $hash->encode($category->id)) }}" enctype="multipart/form-data">
                            <x-slot name="title">
                                {{ __('Category') }}
                            </x-slot>

                            <x-slot name="description">
                                {{ __("Add new food category information") }}
                            </x-slot>

                            <x-slot name="form">
                                @method('PATCH')
                                @csrf
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="image" :value="__('Image')" class="items-center mx-auto text-center" />
                                    <div x-data="{ src: '{{ $category->image_url }}', showInfo: false }" class="mt-2 max-w-sm p-6 mb-4 bg-slate-100 dark:bg-slate-900 border-dashed border-2 border-gray-400 dark:border-gray-500 rounded-lg items-center mx-auto text-center">
                                            <div>
                                                <figure>
                                                    <img class="max-h-48 rounded-lg mx-auto border-2 border-gray-300" :src="src" alt="" />
                                                </figure>
                                                <div x-show="showInfo">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 dark:text-gray-400 mx-auto mb-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                    </svg>
                                                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-700 dark:text-gray-400">Upload picture</h5>
                                                    <p class="text-xs font-semibold leading-5 text-gray-600 dark:text-gray-400 mt-1">724x340px | PNG, JPG, AVIF, WEBP up to 2MB</p>
                                                </div>

                                                <label for="image">
                                                    <input type="file" class="hidden" id="image" name="image" @change="src = URL.createObjectURL($event.target.files[0]); showInfo = false;">
                                                    <span class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mt-2">{{ __('Select A New Image') }}</span>
                                                </label>
                                            </div>
                                            <x-input-error :messages="$errors->get('image')" class="mt-1" class="mt-1" />
                                        </div>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $category->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="is_active" :value="__('Status')" />
                                    <div x-data="{ selectedOption: {{ $category->is_active ?? 'null' }} }">
                                        <select
                                            x-model="selectedOption"
                                            name="is_active"
                                            id="is_active"
                                            class="mt-1.5 w-full px-2 py-2 text-sm border-slate-300 bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                        >
                                            <option value="" disabled>Please select</option>
                                            <option value="1" x-bind:selected="selectedOption == 1 ? 'selected' : ''">Active</option>
                                            <option value="0" x-bind:selected="selectedOption == 0 ? 'selected' : ''">Not Active</option>
                                        </select>
                                    </div>

                                    <x-input-error class="mt-2" :messages="$errors->get('is_active')" />
                                </div>
                            </x-slot>
                            <x-slot name="actions">
                                <x-primary-button>
                                    <i class="ri-save-3-line mt-0.5"></i>{{ __('Save') }}
                                </x-primary-button>
                            </x-slot>
                        </x-form-section>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
