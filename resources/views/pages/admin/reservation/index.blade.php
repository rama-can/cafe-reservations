<x-admin-layout>@section('title'){{ __('Reservations') }}@endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservations ') }}
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
                                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">All Reservations</h2>
                                </div>
                            </div>
                            {{-- <div class="flex items-center justify-center">
                                <form action="{{ route('admin.reservations.index') }}" method="GET">
                                    <select name="status" id="status" onchange="this.form.submit()" class="mt-1 block w-full border-gray-300 dark:border-gray-700 bg-slate-100 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 text-sm rounded-md shadow-sm">
                                        <option value="">All</option>
                                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    @if ($isFiltering)
                                        <a href="{{ route('admin.reservations.index') }}" class="ml-2 text-sm text-gray-600 dark:text-gray-400 mb-4">Clear Filter</a>
                                    @endif
                                </form>
                                <form action="{{ route('admin.reservations.index') }}" method="GET">
                                    <div class="relative">
                                        <x-text-input type="text" name="search" placeholder="Search..." value="{{ $search }}" class="mt-1 block w-full" autocomplete="name" placeholder="Search.." />
                                        <span class="absolute inset-y-0 right-0 flex items-center">
                                            <button type="submit" class="p-2 focus:outline-none focus:shadow-outline">
                                                <x-tabler-search class=""/>
                                            </button>
                                        </span>
                                    </div>
                                    @if ($isSearching)
                                        <a href="{{ route('admin.reservations.index') }}" class="ml-2 text-sm text-gray-600 dark:text-gray-400 mb-4">Clear Search</a>
                                    @endif
                                </form>
                            </div> --}}
                            <div class="flex items-center mt-4 gap-x-3">
                                <a href="{{ route('admin.foods.create') }}">
                                    <x-primary-button>
                                        <x-tabler-file-export class="w-5 h-5 mr-1" />
                                        <span>Export</span>
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-start justify-start mb-4">
                                <form action="{{ route('admin.reservations.index') }}" method="GET">
                                    <select name="status" id="status" onchange="this.form.submit()" class="mt-1 block w-full border-gray-300 dark:border-gray-700 bg-slate-100 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 text-sm rounded-md shadow-sm">
                                        <option value="">All</option>
                                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                                <form action="{{ route('admin.reservations.index') }}" method="GET">
                                    <div class="relative ml-4">
                                        <x-text-input type="text" name="search" placeholder="Search..." value="{{ $search }}" class="mt-1 block w-full" autocomplete="name" placeholder="Search.." />
                                        <span class="absolute inset-y-0 right-0 flex items-center">
                                            <button type="submit" class="p-2 focus:outline-none focus:shadow-outline">
                                                <x-tabler-search class=""/>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                @if ($isSearching)
                                    <a href="{{ route('admin.reservations.index') }}" class="ml-2 text-sm text-indigo-600 dark:text-indigo-400 mt-3">Clear Search</a>
                                @endif
                                @if ($isFiltering)
                                    <a href="{{ route('admin.reservations.index') }}" class="ml-2 text-sm text-indigo-600 dark:text-indigo-400 mt-3">Clear Filter</a>
                                @endif
                            </div>
                            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                                <div class="flex items-center justify-center min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-x-auto border-2 border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <div x-data="{ foodId: null }">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Id
                                                        </th>

                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Name
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Email
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Phone
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Quantity
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Date & Time
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600 dark:text-gray-400">
                                                            Status
                                                        </th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    @if ($reservations->isEmpty())
                                                        <tr>
                                                            <td colspan="8" class="text-center py-4 text-gray-700 dark:text-white">No reservations found.</td>
                                                        </tr>
                                                    @else
                                                    @foreach ($reservations as $data)
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ $data->id }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ $data->name }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ $data->email }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ $data->phone_number }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ $data->quantity }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                            <div class="text-gray-700 dark:text-white">
                                                                {{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }} | {{ date('H:i', strtotime($data->time)) }}
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            @php $spanClass = 'inline gap-x-2 px-3 py-1 text-sm font-normal rounded-full' @endphp
                                                            @if($data->status === 'approved')
                                                                <span class="{{ $spanClass }} text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">Approved</span>
                                                            @elseif($data->status === 'pending')
                                                                <span class="{{ $spanClass }} text-yellow-600 bg-yellow-100/100 dark:bg-gray-800">Pending</span>
                                                            @elseif($data->status === 'rejected')
                                                                <span class="{{ $spanClass }} text-red-500 bg-red-100/60 dark:bg-gray-800">Rejected</span>
                                                            @endif
                                                        </td>

                                                        <td class="px-4 py-4 text-xs font-semibold whitespace-nowrap flex items-center">
                                                            <a href="{{ route('admin.reservations.edit', $hashId->encode($data->id)) }}" class="inline-block">
                                                                <x-secondary-button class="h-8 w-8 p-1 flex items-center justify-center mr-2">
                                                                    <span>
                                                                        <x-tabler-pencil-plus class="text-gray-700 dark:text-gray-400 h-6 w-6" />
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
                                                    @endif
                                                </tbody>
                                            </table>
                                            <x-modal name="confirm-food-deletion" :show="$errors->foodDeletion->isNotEmpty()" focusable :maxWidth="'lg'">
                                                <form :action="'{{ route('admin.reservations.destroy', '') }}' + '/' + foodId" class="p-6" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Are you sure you want to delete this food?') }}
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
                        <div class="mt-6 sm:flex sm:items-center sm:justify-end">
                            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                                {{ $reservations->links() }}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
