<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('user.update') }}">
                    @csrf

                    <input type="hidden" value="{{ $user->id }}" name="id">
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="surname" :value="__('Surname')" />
                        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$user->surname" required autofocus autocomplete="surname" />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="user_type" :value="__('User type')" />
                        @php
                            $user_type = \App\Enums\UserTypeEnum::cases();   
                        @endphp
                        
                        <x-text-select id="user_type" class="block mt-1 w-full" name="user_type" required autocomplete="user_type" :values="$user_type" :selected="$user->user_type" /> 
            
                        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
            
                        <x-primary-button class="ml-4">
                            {{ __('Update user') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>