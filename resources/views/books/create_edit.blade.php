<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        
            @if(empty($book))
                {{ __('Add new Book') }}
            @else
                {{ __('Edit Book') }}
            @endif
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" 
                        @if(empty($book))
                            action="{{ route('book.store') }}"
                        @else
                            action="{{ route('book.update') }}"
                        @endif
                    >
                        @csrf
    
                        @if(!empty($book))
                            <input type="hidden" value="{{ $book[0]['id'] }}" name="id">
                        @endif

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="!empty($book) ? $book[0]['title'] : old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="!empty($book) ? $book[0]['description'] : old('description')"  autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="book_number" :value="__('Book number')" />
                            <x-text-input id="book_number" class="block mt-1 w-full" type="text" name="book_number" :value="!empty($book) ? $book[0]['book_number'] : old('book_number')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('book_number')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="author_id" :value="__('Author')" />
                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="author_id" id="author_id">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->getFullNameAttribute() }}</option>
                                @endforeach
                            <select>

                            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                
                            @if(empty($book))
                            <x-primary-button class="ml-4">
                                {{ __('Add book') }}
                            </x-primary-button>
                            @else
                                <x-primary-button class="ml-4">
                                    {{ __('Update book') }}
                                </x-primary-button>
                            @endif

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>