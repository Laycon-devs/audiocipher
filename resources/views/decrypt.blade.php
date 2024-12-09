<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Decrypt') }}
        </h2>
    </x-slot>

    {{-- @if ($successMessage)
    <div class="text-success fw-bold fs-4 p-4 rounded mb-4">
        {{ $successMessage }}
    </div>
    @endif --}}

    <div class="d-flex align-items-center justify-content-center text-white">
        <div class="p-4 rounded shadow w-100" style="">
            <h2 class="text-center text-success fw-bold mb-4">Decrypt Tab</h2>
            <form action="{{ route('decrypt') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Audio File Upload -->
                <div class="mb-4 rounded p-3" style="background-color: #1e1b4b;">
                    <label for="audio" class="block text-sm font-medium text-gray-700 text-success fw-bold">Upload
                        Encrypted Audio</label>
                    <input type="file" name="audio" id="audio" accept=".mp3,.wav"
                        class="mt-1 block text-success w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('audio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Decryption Key Input -->
                <div class="mb-4 rounded p-3" style="background-color: #1e1b4b;">
                    <label for="decryption_key"
                        class="block text-sm font-medium text-gray-700 text-success fw-bold">Decryption Key</label>
                    <input type="text" name="decryption_key" id="decryption_key"
                        class="mt-1 text-success block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter Decryption Key">
                    @error('decryption_key')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Decryption Key Input -->
                <div class="mb-4 rounded p-3" style="background-color: #1e1b4b;">
                    <label for="encryption_key"
                        class="block text-sm font-medium text-gray-700 text-success fw-bold">Audio Key</label>
                    <input type="text" name="encryption_key" id="encryption_key"
                        class="mt-1 text-success block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter Audio Key">
                    @error('encryption_key')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-success fw-bold py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        style="background-color: #1e1b4b;">
                        Decrypt
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>