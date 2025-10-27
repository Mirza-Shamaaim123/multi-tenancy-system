<x-app-layout>
    <x-slot name="header">
        <div class="  flex justify-between items-center ">
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                {{ __('Store') }}
            </h2>
            <a href="{{ route('tenants.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                + Add Store
            </a>
        </div>
    </x-slot>
    <div class="main">
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
                                Store List
                            </h2>


                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-700">
                                    <thead class="bg-gray-50 uppercase text-xs font-semibold text-gray-600 border-b">
                                        <tr>
                                            <th class="px-6 py-3">#</th>
                                            <th class="px-6 py-3">Name</th>
                                            <th class="px-6 py-3">Email</th>
                                            <th class="px-6 py-3">Domain</th>
                                            <th class="px-6 py-3">Warehouse</th>
                                            <th class="px-6 py-3">Created</th>
                                            <th class="px-6 py-3 text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($tenants as $key => $tenant)
                                            <tr
                                                class="bg-white hover:bg-indigo-50 transition duration-200 ease-in-out border-b last:border-none">
                                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $key + 1 }}</td>
                                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $tenant->name }}
                                                </td>
                                                <td class="px-6 py-4">{{ $tenant->email }}</td>

                                                <td class="px-6 py-4 space-y-1">
                                                    @foreach ($tenant->domains as $domain)
                                                        <span
                                                            class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">
                                                            {{ $domain->domain }}
                                                        </span>
                                                    @endforeach
                                                </td>

                                                <td class="px-6 py-4">
                                                    <span
                                                        class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs font-medium">
                                                        {{ $tenant->warehouse ? $tenant->warehouse->name : '—' }}
                                                    </span>
                                                </td>

                                                <td class="px-6 py-4 text-gray-500 text-sm">
                                                    {{ $tenant->created_at->format('d M Y') }}
                                                </td>

                                                <td class="px-6 py-4 text-center">
                                                    <div class="flex justify-center items-center gap-2">

                                                        @if ($tenant->domains->isNotEmpty())
                                                            <a href="http://{{ $tenant->domains->first()->domain }}:8000/"
                                                                target="_blank"
                                                                class="p-2 bg-green-100 text-green-600 rounded-full hover:bg-green-200 transition"
                                                                title="Visit Store">
                                                                🏪
                                                            </a>
                                                        @endif


                                                        <a href="{{ route('tenants.edit', $tenant->id) }}"
                                                            class="p-2 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition"
                                                            title="Edit Tenant">
                                                            ✏️
                                                        </a>

                                                        <form action="{{ route('tenants.destroy', $tenant->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure to delete this tenant?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="p-2 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition"
                                                                title="Delete Tenant">
                                                                🗑️
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="py-8 text-center text-gray-400">No Tenants
                                                    Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-6 px-6">
                                    {{ $tenants->links() }}
                                </div>
                            </div>


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

    .main {
        /* background-color: red; */
        padding-right: 110px;
        padding-left: 100px;

    }
</style>
