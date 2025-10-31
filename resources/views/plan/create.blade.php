<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Store') }}
            {{-- <x-btn-link class="float-right" href="{{ route('tenants.create') }}">Add Tenant</x-btn-link> --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('plans.store') }}">
                        @csrf

                        <!-- Plan -->
                        <div>
                            <x-input-label for="name" :value="__('Plan')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Store -->
                        <div class="mt-4">
                            <x-input-label for="store" :value="__('Store')" />
                            <x-text-input id="store" class="block mt-1 w-full" type="text" name="store"
                                :value="old('store')" required autofocus autocomplete="store" />
                            <x-input-error :messages="$errors->get('store')" class="mt-2" />
                        </div>
                        {{-- Product --}}
                        <div>
                            <x-input-label for="product" :value="__('Product')" />
                            <x-text-input id="product" class="block mt-1 w-full" type="text" name="product"
                                :value="old('product')" required autofocus autocomplete="product" />
                            <x-input-error :messages="$errors->get('product')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password" :value="__('Report')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('Team Access')" class="mt-2" />
                        </div> --}}

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />

                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                :value="old('price')" required autofocus autocomplete="price" />

                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                {{ __('Create Store') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
