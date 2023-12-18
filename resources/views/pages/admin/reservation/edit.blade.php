<x-admin-layout>@section('title'){{ __('Edit Reservation') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Reservation') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl items-center mx-auto">
                    <section>
                    <x-form-section action="{{ route('admin.categories.update', $hash->encode($reservation->id)) }}" enctype="multipart/form-data">
                            <x-slot name="title">
                                {{ __('Reservation') }}
                            </x-slot>

                            <x-slot name="description">
                                {{ __("Edit reservation information") }}
                            </x-slot>

                            <x-slot name="form">
                                @method('PATCH')
                                @csrf
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-icon-input id="name" type="text" class="mt-1 block w-full" name="name" :value="old('name', $reservation['name'])" placeholder="name" icon="user" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-icon-input id="email" type="email" class="mt-1 block w-full" name="email" :value="old('email', $reservation['email'])" placeholder="email" icon="mail-filled" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-icon-input id="phone_number" type="tel" class="mt-1 block w-full" name="phone_number" :value="old('phone_number', $reservation['phone_number'])" placeholder="phone number" icon="mail-filled" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="reservation_date" :value="__('Phone Number')" />
                                    <x-text-icon-input id="reservation_date" type="date" class="mt-1 block w-full" name="reservation_date" :value="old('reservation_date', $reservation->reservation_date->format('Y-m-d'))" placeholder="phone number" icon="calendar-event" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reservation_date')" />
                                </div>
                                {{-- <div class="col-span-6 sm:col-span-6">
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
                                </div> --}}
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
