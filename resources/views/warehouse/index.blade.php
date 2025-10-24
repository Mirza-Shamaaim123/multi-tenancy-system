<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                {{ __('Warehouse') }}
            </h2>
            <a href="{{ route('warehouse.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                + Add Warehouse
            </a>
        </div>
    </x-slot>
    <div class="hello">


        <div class="py-10">
            <div class="w-full px-8">
                <div class="bg-green-400 shadow-md rounded-2xl overflow-hidden border border-gray-200">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7m-2 0H5m14 0l-2-3H7L5 7" />
                            </svg>
                            Warehouse List
                        </h2>

                        <div class="overflow-x-auto rounded-lg">
                            <table class="w-full text-sm text-left border border-gray-200">
                                <thead
                                    class="bg-blue-50 text-gray-700 uppercase text-xs font-semibold divide-x divide-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 border-b">#</th>
                                        <th class="px-6 py-3 border-b">Name</th>
                                        <th class="px-6 py-3 border-b">Manager</th>
                                        <th class="px-6 py-3 border-b">Location</th>
                                        <th class="px-6 py-3 border-b">Created At</th>
                                        <th class="px-6 py-3 border-b text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100 divide-x-0">
                                    @forelse ($warehouses as $key => $warehouse)
                                        <tr
                                            class="hover:bg-blue-50 transition duration-150 ease-in-out divide-x divide-gray-200">
                                            <td class="px-6 py-4 text-gray-700">{{ $key + 1 }}</td>
                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $warehouse->name }}</td>
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                {{ $warehouse->manager_name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                <span
                                                    class="inline-block bg-gray-100 px-2 py-1 rounded text-gray-600 text-xs">
                                                    {{ $warehouse->location }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $warehouse->created_at->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex justify-center items-center space-x-4">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('warehouse.edit', $warehouse->id) }}"
                                                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                                                        Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('warehouse.destroy', $warehouse->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this warehouse?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="py-6 text-center text-gray-500">
                                                No Warehouses Found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .hello {
        background-color: rgb(255, 255, 255);
        margin: 40px;

    }
</style>
