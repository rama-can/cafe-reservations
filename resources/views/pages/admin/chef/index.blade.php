<x-admin-layout>@section('title'){{ __('Chefs') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chefs') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <section class="container px-4 mx-auto">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div>
                                <div class="flex items-center gap-x-3">
                                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">Chefs</h2>
                                </div>
                            </div>

                            <div class="flex items-center mt-4 gap-x-3">
                                <a href="{{ route('admin.chefs.create') }}">
                                    <x-primary-button>
                                        <x-tabler-plus class="w-5 h-5 mr-1" />
                                        <span>Add Chef</span>
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col mt-6">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <div x-data="{ chefId: null }">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            No
                                                        </th>

                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Image
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Name
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Task
                                                        </th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    @foreach ($chefs as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-800 dark:text-white">
                                                                {{ $loop->iteration }}
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <img class="object-cover w-10 h-10 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="{{ $data->image_url }}" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-800 dark:text-white">
                                                                {{ $data->name }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="text-gray-800 dark:text-white">
                                                                {{ $data->task }}
                                                            </div>
                                                        </td>

                                                        <td class="px-4 py-4 text-xs font-semibold whitespace-nowrap flex items-center">
                                                            <a href="{{ route('admin.chefs.edit', $hashId->encode($data->id)) }}" class="inline-block">
                                                                <x-secondary-button class="h-8 w-8 p-1 flex items-center justify-center mr-2">
                                                                    <span>
                                                                        <x-tabler-pencil-plus class="text-gray-600 dark:text-gray-400 h-6 w-6" />
                                                                    </span>
                                                                </x-secondary-button>
                                                            </a>
                                                            <x-danger-button class="h-8 w-8 p-1 flex items-center justify-center"
                                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-chef-deletion')"
                                                                @click="chefId = '{{ $hashId->encode($data->id) }}';"
                                                            >
                                                                <span>
                                                                    <x-tabler-trash class="text-gray-100 dark:text-gray-200 h-6 w-6" />
                                                                </span>
                                                            </x-danger-button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <x-modal name="confirm-chef-deletion" :show="$errors->chefDeletion->isNotEmpty()" focusable :maxWidth="'lg'">
                                                <form :action="'{{ route('admin.chefs.destroy', '') }}' + '/' + chefId" class="p-6" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Are you sure you want to delete this chef?') }}
                                                    </h2>
                                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                        {{ __('All of its resources and data will be permanently deleted. Please to confirm you would like to permanently delete your category.') }}
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
                            </div>

                            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                                <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>

                                    <span>
                                        previous
                                    </span>
                                </a>

                                <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <span>
                                        Next
                                    </span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div> --}}
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
