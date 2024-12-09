<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($audio->renamed_name . ' Decryption Message') }}
        </h2>
    </x-slot>


    <div class="d-flex align-items-center justify-content-center text-white">
        <div class="p-6 rounded shadow w-100">
            {{-- @if ($successMessage)
            <div class="text-success fw-bold fs-4 p-4 rounded mb-4">
                {{ $successMessage }}
            </div>
            @endif --}}
            {{-- <h2 class="text-center text-success fw-bold mb-4">Encrypt Tab</h2> --}}

            <div class="bg-gray-100 rounded-lg flex items-center justify-center" style="background-color: #1e1b4b;">
                <div class="p-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {!! $decryptedMessage !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="py-12 hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>