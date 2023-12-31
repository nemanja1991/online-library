@props(['authors' => $authors])

<div class="relative overflow-x-auto">

    @if(!empty($authors))

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">{{ __('Name') }}</th>
                <th class="px-6 py-3">{{ __('Surname') }}</th>
                <th class="px-6 py-3">{{ __('Image') }}</th>
                <th class="px-6 py-3">{{ __('Edit') }}</th>
                <th class="px-6 py-3">{{ __('Delete') }}</th>
            </tr>
        </thead>
        <tbody >
            @foreach($authors as $author)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-3">{{ $author->name }}</td>
                    <td class="px-6 py-3">{{ $author->surname }}</td>
                    <td class="px-6 py-3">{{ $author->surname }}</td>
                    <td class="px-6 py-3">
                        
                        @can('update_author', $author)
                            <x-nav-link :href="route('author.edit', $author->id)">
                                {{ __('click') }}
                            </x-nav-link>
                        @endcan
                    </td>
                    <td class="px-6 py-3">
                        @can('delete_author', $author)
                            <x-nav-link :href="route('author.destroy', $author->id)">
                                {{ __('click') }}
                            </x-nav-link>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>{{ __('There is no added authors in our library.') }}</p>
    @endif
</div>

    
