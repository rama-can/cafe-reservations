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
                    <x-form-section action="{{ route('admin.reservations.update', $hash->encode($reservation->id)) }}">
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
                                    <x-text-icon-input id="name" type="text" class="mt-1 block w-full" name="name" :value="old('name', $reservation['name'])" placeholder="name" icon="user-circle" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-icon-input id="email" type="email" class="mt-1 block w-full" name="email" :value="old('email', $reservation['email'])" placeholder="email" icon="mail-filled" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-icon-input id="phone_number" type="tel" class="mt-1 block w-full" name="phone_number" :value="old('phone_number', $reservation['phone_number'])" placeholder="phone number" icon="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="quantity" :value="__('Number of Guests')" />
                                    <x-text-icon-input id="quantity" type="tel" class="mt-1 block w-full" name="quantity" :value="old('quantity', $reservation->quantity)" placeholder="phone number" icon="users-group" />
                                    <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="reservation_date" :value="__('Reservation Date')" />
                                    <x-text-icon-input id="reservation_date" type="text" class="dateReservation mt-1 block w-full" name="reservation_date" :value="old('reservation_date', $reservation->reservation_date->format('d-m-Y'))" placeholder="phone number" icon="calendar-event" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reservation_date')" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-input-label for="reservation_time" :value="__('Reservation Time')" />
                                    <x-text-icon-input id="reservation_time" type="text" class="timeReservation mt-1 block w-full" name="reservation_time" :value="old('reservation_time')" placeholder="reservation time" icon="calendar-event" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reservation_time')" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea name="description" id="description" cols="30" rows="3" class="mt-1 block w-full px-2 py-2 text-sm border-slate-300 bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description', $reservation->message) }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-input-label for="status" :value="__('Status')" />
                                    <x-select name="status" id="status" placeholder="choose status" :options="[
                                        'approved' => __('Approved'),
                                        'pending' => __('Pending'),
                                        'rejected' => __('Rejected')
                                    ]" :selectedValue="$reservation->status" />
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
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
    @push('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            flatpickr('.dateReservation', {
                dateFormat: 'd-m-Y',
                enableTime: false,
            });
            flatpickr('.timeReservation', {
                dateFormat: 'H:i',
                defaultDate: '{{ $reservation->reservation_time }}',
                enableTime: true,
                time_24hr: true,
                noCalendar: true,
            });
        });
    </script>
    @endpush
</x-admin-layout>
