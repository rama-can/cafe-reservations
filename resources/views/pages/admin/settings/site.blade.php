<x-admin-layout>@section('title'){{ __('Setting Site') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl items-center mx-auto">
                    <section>
                    <x-form-section action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                            <x-slot name="title">
                                {{ __('Settings') }}
                            </x-slot>

                            <x-slot name="description">
                                {{ __("Update settings information") }}
                            </x-slot>

                            <x-slot name="form">
                                @method('PATCH')
                                @csrf
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="logo" :value="__('Logo')" class="items-center mx-auto text-center" />
                                    <div x-data="{ src: '{{ url($data['logo']) }}', showInfo: false }" class="mt-2 max-w-sm p-6 mb-4 bg-slate-100 dark:bg-slate-900 border-dashed border-2 border-gray-400 dark:border-gray-500 rounded-lg items-center mx-auto text-center">
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

                                                <label for="logo">
                                                    <input type="file" class="hidden" id="logo" name="logo" @change="src = URL.createObjectURL($event.target.files[0]); showInfo = false;">
                                                    <span class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mt-2">{{ __('Select A New Logo') }}</span>
                                                </label>
                                            </div>
                                            <x-input-error :messages="$errors->get('logo')" class="mt-1" class="mt-1" />
                                        </div>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="site_name" :value="__('Site Name')" />
                                    <x-text-input id="site_name" name="site_name" type="text" class="mt-1 block w-full" :value="old('site_name', $data['site_name'])" required autofocus autocomplete="site_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('site_name')" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="site_description" value="{{ __('Site Description') }}" />
                                    <x-input-text-area class="mt-1 w-full" id="site_description" name="site_description" placeholder="site description" cols="4" rows="3" :value="old('site_description', $data['site_description'])" />
                                    <x-input-error :messages="$errors->get('site_description')" class="mt-1" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="address" value="{{ __('Address') }}" />
                                    <x-input-text-area class="mt-1 w-full" id="address" name="address" placeholder="address" cols="4" rows="3" :value="old('address', $data['address'])" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-1" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="copyright" :value="__('Copyright')" />
                                    <x-text-input id="copyright" name="copyright" type="text" class="mt-1 block w-full" :value="old('copyright', $data['copyright'])" required autofocus autocomplete="copyright" />
                                    <x-input-error class="mt-2" :messages="$errors->get('copyright')" />
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-input-label for="facebook" value="{{ __('Facebook') }}" />
                                    <x-text-icon-input id="facebook" type="text" class="mt-1 block w-full" name="facebook" :value="old('facebook', $data['facebook'])" placeholder="facebook" autocomplete="facebook" icon="brand-facebook"/>
                                    <x-input-error :messages="$errors->get('facebook')" class="mt-1" />
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-input-label for="instagram" value="{{ __('Instagram') }}" />
                                    <x-text-icon-input id="instagram" type="text" class="mt-1 block w-full" name="instagram" :value="old('instagram', $data['instagram'])" placeholder="instagram" autocomplete="instagram" icon="brand-instagram"/>
                                    <x-input-error :messages="$errors->get('instagram')" class="mt-1" />
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-input-label for="twitter" value="{{ __('Twitter') }}" />
                                    <x-text-icon-input id="twitter" type="text" class="mt-1 block w-full" name="twitter" :value="old('twitter', $data['twitter'])" placeholder="twitter" autocomplete="twitter" icon="brand-twitter"/>
                                    <x-input-error :messages="$errors->get('twitter')" class="mt-1" />
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-input-label for="email" value="{{ __('Email') }}" />
                                    <x-text-icon-input id="email" type="text" class="mt-1 block w-full" name="email" :value="old('email', $data['email'])" placeholder="email" autocomplete="email" icon="mail"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
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
