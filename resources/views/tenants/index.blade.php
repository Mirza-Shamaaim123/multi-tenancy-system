<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="float-right" href="{{ route('tenants.create') }}">Add Tenant</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Tenants List</h2>

                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                        <thead>
                            <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                                <th class="py-2 px-4 border-b">#</th>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Domain</th>
                                <th class="py-2 px-4 border-b">Created At</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tenants as $key => $tenant)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $tenant->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $tenant->email }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @foreach ($tenant->domains as $domain)
                                            {{ $domain->domain }} {{ $loop->last ? '' : ',' }}
                                        @endforeach
                                      
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        {{ $tenant->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="#"
                                            class="text-blue-600 hover:underline">Edit</a> |

                                        <form action="#" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline"
                                                onclick="return confirm('Are you sure to delete this tenant?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-4 text-center text-gray-500">
                                        No Tenants Found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
