@props(['books' => $books])

<div class="relative overflow-x-auto">

    @if(!empty($books))

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">{{ __('Title') }}</th>
                <th class="px-6 py-3">{{ __('Description') }}</th>
                <th class="px-6 py-3">{{ __('Book number') }}</th>
                <th class="px-6 py-3">{{ __('Autor') }}</th>
                <th class="px-6 py-3">{{ __('Edit') }}</th>
                <th class="px-6 py-3">{{ __('Delete') }}</th>
            </tr>
        </thead>
        <tbody >
            @foreach($books as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-3">{{ $book->title }}</td>
                    <td class="px-6 py-3">{{ $book->description }}</td>
                    <td class="px-6 py-3">{{ $book->book_number }}</td>
                    <td class="px-6 py-3">{{ $book->author->name }}</td>
                    <td class="px-6 py-3">

                        <x-nav-link :href="route('book.edit', $book->id)">
                            {{ __('click') }}
                        </x-nav-link>
                    
                    </td>
                    <td class="px-6 py-3">

                        <x-nav-link :href="route('book.destroy', $book->id)">
                            {{ __('click') }}
                        </x-nav-link>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>{{ __('There is no added books in our library.') }}</p>
    @endif
</div>

    
