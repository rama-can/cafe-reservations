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
                                {{ __("Update about") }}
                            </x-slot>

                            <x-slot name="form">
                                @method('PATCH')
                                @csrf
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="about-us" value="{{ __('About') }}" />
                                    <x-input-text-area class="mt-1 w-full" id="about-us" name="about-us" placeholder="about" cols="4" rows="8" :value="old('about-us', $data)" />
                                    <x-input-error :messages="$errors->get('about-us')" class="mt-1" />
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
