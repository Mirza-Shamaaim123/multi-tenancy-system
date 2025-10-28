<x-app-layout>
    <x-slot name="header">
        <div class="  flex justify-between items-center ">
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                {{ __('Plans') }}
            </h2>
            <a href="{{ route('tenants.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                + Add Plans
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
                                Plans List
                            </h2>


                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-700">
                                    <thead class="bg-gray-50 uppercase text-xs font-semibold text-gray-600 border-b">
                                        <tr>
                                            <th class="px-6 py-3">#</th>
                                            <th class="px-6 py-3">Plan</th>
                                            <th class="px-6 py-3">Store</th>
                                            <th class="px-6 py-3">Product</th>
                                            <th class="px-6 py-3">Report</th>
                                            <th class="px-6 py-3">Team Access</th>
                                            <th class="px-6 py-3">Price / Month</th>
                                            <th class="px-6 py-3 text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr
                                            class="bg-white hover:bg-orange-50 transition duration-200 ease-in-out border-b">
                                            <td class="px-6 py-4 text-gray-800 text-center font-medium">1</td>
                                            <td class="px-6 py-4 text-center font-semibold text-gray-900">Starter</td>
                                            <td class="px-6 py-4 text-center">1</td>
                                            <td class="px-6 py-4 text-center">100</td>
                                            <td class="px-6 py-4 text-center">Basic</td>
                                            <td class="px-6 py-4 text-center">❌</td>
                                            <td class="px-6 py-4 text-center">$9</td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="/register"
                                                    class="px-3 py-1 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition text-xs">
                                                    Choose
                                                </a>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-white hover:bg-orange-50 transition duration-200 ease-in-out border-b">
                                            <td class="px-6 py-4 text-gray-800 text-center font-medium">2</td>
                                            <td class="px-6 py-4 text-center font-semibold text-gray-900">Professional
                                            </td>
                                            <td class="px-6 py-4 text-center">3</td>
                                            <td class="px-6 py-4 text-center">Unlimited</td>
                                            <td class="px-6 py-4 text-center">Advanced</td>
                                            <td class="px-6 py-4 text-center">✅</td>
                                            <td class="px-6 py-4 text-center">$29</td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="/register"
                                                    class="px-3 py-1 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition text-xs">
                                                    Choose
                                                </a>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-white hover:bg-orange-50 transition duration-200 ease-in-out border-b">
                                            <td class="px-6 py-4 text-gray-800 text-center font-medium">3</td>
                                            <td class="px-6 py-4 text-center font-semibold text-gray-900">Enterprise
                                            </td>
                                            <td class="px-6 py-4 text-center">Unlimited</td>
                                            <td class="px-6 py-4 text-center">Unlimited</td>
                                            <td class="px-6 py-4 text-center">Premium + Export</td>
                                            <td class="px-6 py-4 text-center">✅</td>
                                            <td class="px-6 py-4 text-center">$99</td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="/contact"
                                                    class="px-3 py-1 bg-gray-800 text-white rounded-full hover:bg-gray-900 transition text-xs">
                                                    Contact
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

    .h {
        color: white;
    }
</style>
