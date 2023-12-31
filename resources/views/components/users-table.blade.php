@props(['users' => $users])

<div class="relative overflow-x-auto">

    @if(!empty($users))

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">{{ __('Name') }}</th>
                <th class="px-6 py-3">{{ __('Surname') }}</th>
                <th class="px-6 py-3">{{ __('Email') }}</th>
                <th class="px-6 py-3">{{ __('User type') }}</th>
                <th class="px-6 py-3">{{ __('Edit') }}</th>
                <th class="px-6 py-3">{{ __('Delete') }}</th>
            </tr>
        </thead>
        <tbody >
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-3">{{ $user->name }}</td>
                    <td class="px-6 py-3">{{ $user->surname }}</td>
                    <td class="px-6 py-3">{{ $user->email }}</td>
                    <td class="px-6 py-3">{{ $user->user_type }}</td>
                    <td class="px-6 py-3">

                        <x-nav-link :href="route('user.edit', $user->id)">
                            {{ __('click') }}
                        </x-nav-link>
                    
                    </td>
                    <td class="px-6 py-3">

                        <x-nav-link :href="route('user.destroy', $user->id)">
                            {{ __('click') }}
                        </x-nav-link>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>{{ __('There is no added authors in our library.') }}</p>
    @endif
</div>

    
