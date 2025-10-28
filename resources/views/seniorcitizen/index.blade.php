<x-app-layout>

    {{-- 1. Modified the header to include the button --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Senior Citizen Records') }}
            </h2>
            
            <button @click="openCreateModal()" class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Senior Citizen
            </button>
        </div>
    </x-slot>

    {{-- We must include your partials/header.blade.php to get the styles --}}
    @include('partials.header')

    <body class="flex flex-col h-full" x-data="seniorCitizenCrud()">

        <main class="flex-grow">
            {{-- 
                The <x-app-layout> component adds its own padding (py-12).
                We'll use a standard max-width container inside it.
            --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- 2. Removed the old <header> block --}}

                {{-- 3. Removed the standalone button div that was here --}}
                
                @if (session('success'))
                    <x-alert type="success" class="mb-6" id="success-alert">
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </x-alert>
                @endif

                @if ($errors->any())
                    <x-alert type="error" class="mb-6">
                        <p class="font-bold">Please fix the following errors:</p>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alert>
                @endif
                
                {{-- This will include your table content --}}
                @include('seniorcitizen.content')

            </div>
        </main>

        @include('seniorcitizen.view-modal')
        @include('seniorcitizen.add-edit-modal')
        @include('seniorcitizen.qr-modal')
        @include('seniorcitizen.delete-modal')

        @include('partials.scripts')
    </body>
</x-app-layout>

