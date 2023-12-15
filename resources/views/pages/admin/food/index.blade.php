<x-admin-layout>@section('title'){{ __('Food') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food ') }}
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
                                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">All food menus</h2>
                                </div>
                            </div>

                            <div class="flex items-center mt-4 gap-x-3">
                                <a href="{{ route('admin.foods.create') }}">
                                    <x-primary-button>
                                        <x-tabler-plus class="w-5 h-5 mr-1" />
                                        <span>Add Food</span>
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <div x-data="{ foodId: null }">
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
                                                            Price
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Category
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Status
                                                        </th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    @foreach ($foods as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-800 dark:text-white">
                                                                {{ $data->id }}
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
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-800 dark:text-white">
                                                                {{ $data->curenccy_rupiah }}
                                                            </div>
                                                        </td>
                                                        {{-- <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div>
                                                                <h4 class="text-gray-700 dark:text-gray-200">Content curating app</h4>
                                                                <p class="text-gray-500 dark:text-gray-400">Brings all your news into one place</p>
                                                            </div>
                                                        </td> --}}
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <p class="text-indigo-500 dark:text-indigo-400">
                                                                @foreach ($categories as $category)
                                                                <a href="{{ route('admin.categories.edit', $hashId->encode($category->id)) }}">
                                                                    {{ $category->name }}
                                                                </a>@if (!$loop->last)|@endif
                                                                @endforeach
                                                            </p>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <span class="inline px-3 py-1 text-sm font-normal rounded-full
                                                                {{ $data->is_available === 1 ? 'text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800' : 'text-red-500 gap-x-2 bg-red-100/60 dark:bg-gray-800' }}">
                                                                {{ $data->is_available === 1 ? 'Available' : 'Not Available' }}
                                                            </span>
                                                        </td>

                                                        <td class="px-4 py-4 text-xs font-semibold whitespace-nowrap flex items-center">
                                                            <a href="{{ route('admin.foods.edit', $hashId->encode($data->id)) }}" class="inline-block">
                                                                <x-secondary-button class="h-8 w-8 p-1 flex items-center justify-center mr-2">
                                                                    <span>
                                                                        <x-tabler-pencil-plus class="text-gray-600 dark:text-gray-400 h-6 w-6" />
                                                                    </span>
                                                                </x-secondary-button>
                                                            </a>
                                                            <x-danger-button class="h-8 w-8 p-1 flex items-center justify-center"
                                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-food-deletion')"
                                                                @click="foodId = '{{ $hashId->encode($data->id) }}';"
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
                                            <x-modal name="confirm-food-deletion" :show="$errors->foodDeletion->isNotEmpty()" focusable :maxWidth="'lg'">
                                                <form :action="'{{ route('admin.categories.destroy', '') }}' + '/' + foodId" class="p-6" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Are you sure you want to delete this food?') }}
                                                    </h2>
                                                    {{-- <h2 class="text-lg font-semibold mb-4">Modal Content for ID: <span x-text="categoryId"></span></h2> --}}
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

                        <div class="mt-6 sm:flex sm:items-center sm:justify-end">
                            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                                {{ $foods->links() }}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
