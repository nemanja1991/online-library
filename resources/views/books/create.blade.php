<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add new Book') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('book.store') }}">
                        @csrf
    
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="book_number" :value="__('Book number')" />
                            <x-text-input id="book_number" class="block mt-1 w-full" type="text" name="book_number" :value="old('book_number')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('book_number')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="author_id" :value="__('Author')" />
                            <x-text-input id="author_id" class="block mt-1 w-full" type="text" name="author_id" :value="old('author_id')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                
                            <x-primary-button class="ml-4">
                                {{ __('Add book') }}
                            </x-primary-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>