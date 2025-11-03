<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Update Form -->
                    <form method="POST" action="{{ route('plans.update', $plan->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Plan -->
                        <div>
                            <x-input-label for="plan" :value="__('Plan')" />
                            <x-text-input id="plan" class="block mt-1 w-full" type="text" name="plan"
                                value="{{ old('plan', $plan->plan) }}" required autofocus autocomplete="plan" />
                            <x-input-error :messages="$errors->get('plan')" class="mt-2" />
                        </div>

                        <!-- Duration -->
                        <div class="mt-4">
                            <x-input-label for="duration" :value="__('Duration')" />
                            <x-text-input id="duration" class="block mt-1 w-full" type="text" name="duration"
                                value="{{ old('duration', $plan->duration) }}" required autocomplete="duration" />
                            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                value="{{ old('description', $plan->description) }}" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                value="{{ old('price', $plan->price) }}" required autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update Plan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
