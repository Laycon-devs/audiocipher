<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($audio->renamed_name . ' Decryption Information') }}
        </h2>
    </x-slot>


    <div class="d-flex align-items-center justify-content-center text-white">
        <div class="p-6 rounded shadow w-100" >
            @if ($successMessage)
            <div class="text-success fw-bold fs-4 p-4 rounded mb-4">
                {{ $successMessage }}
            </div>
        @endif
            {{-- <h2 class="text-center text-success fw-bold mb-4">Encrypt Tab</h2> --}}
    
            <div class="bg-gray-100 rounded-lg flex items-center justify-center" style="background-color: #1e1b4b;">
                <div class="p-3 rounded-lg shadow-lg w-full max-w-md m-3" style="background-color: #1e1b4b;">
                    {{-- <h2 class="text-2xl fw-bold text-success mb-4 text-center">Details</h2> --}}
            
                    <div class="mt-4">
                        <p class="font-semibold mb-2">Decryption Key:</p>
                        <p class="text-success fw-bold bg-gray-100 p-2 rounded">{{ $audio->decryption_key }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-semibold mb-2">Audio Key:</p>
                        <p class="text-success fw-bold bg-gray-100 p-2 rounded">{{ $audio->encryption_key }}</p>
                    </div>
            
                    <div class="mt-4">
                        <p class="font-semibold mb-2">Download Encrypted Audio:</p>
                        <a href="{{ asset('uploads/' . $audio->renamed_name) }}" class="text-primary underline" download>
                            {{ $audio->renamed_name }}
                        </a>
                    </div>                    
            
                    <div class="mt-6">
                        <a href="{{route('encrypt')}}" class="text-indigo-600 underline">Go back to Encrypt Page</a>
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
