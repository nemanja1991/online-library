<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
        <br>
        
        <x-search />

    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if(auth()->user()->user_type->value == 'librarian')
                        <x-nav-link :href="route('book.create')">
                            {{ __('Add new Book') }}
                        </x-nav-link>
                    @endif
                    
                    <hr><br>
                    
                    <x-books-table :books="$books" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
