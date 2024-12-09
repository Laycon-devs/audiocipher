<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard: My Encrypts') }}
        </h2>
    </x-slot>

    @if ($currentUserFile && $currentUserFile->count() > 0)
    @foreach ($currentUserFile as $item)   
    <a href="{{ route('encrypted', ['id' => $item->id]) }}">
        <div class="p-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $item->renamed_name }}
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    @else
    <div class="p-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Your don't have any encrption information yet...
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
