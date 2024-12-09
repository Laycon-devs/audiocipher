<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Encrypt') }}
        </h2>
    </x-slot>


    <div class="d-flex min-vh-100 align-items-center justify-content-center text-white">
        <div class="p-4 rounded shadow w-100" style="">
            <h2 class="text-center text-success fw-bold mb-4">Encrypt Tab</h2>
    
            <form action="/encrypt-audio" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                <!-- Audio File Input -->
                <div class="mb-3 rounded p-3" style="background-color: #1e1b4b;">
                    <label for="audio" class="form-label">Upload Audio</label>
                    <input
                        type="file"
                        name="audio"
                        id="audio"
                        accept=".wav,.mp3"
                        class="form-control text-success fw-bold"
                        >
                        @error('audio')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
    
                <!-- Message Input -->
                <div class="mb-3 rounded p-3" style="background-color: #1e1b4b;">
                    <label for="message" class="form-label">Message to Encrypt</label>
                    <textarea
                        name="message"
                        id="message"
                        class="form-control"
                        placeholder="Enter your message here..."
                        ></textarea>
                        @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
    
                <!-- Submit Button -->
                <div class="">
                    <button
                        type="submit"
                        class="btn btn-success w-100">
                        Encrypt Audio
                    </button>
                </div>
            </form>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new SimpleMDE({
                element: document.getElementById("message"),
                spellChecker: false, // Disable spell-check if not needed
                placeholder: "Enter your Markdown-formatted message here...",
            });
        });
    </script>
    
    
</x-app-layout>
