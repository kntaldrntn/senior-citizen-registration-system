<x-app-layout>
    {{-- This is the "clean" header style from Image 1 --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Senior Citizen Records Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- We have removed the extra <header> block that was here. --}}

            {{-- Statistics Grid -- Updated to 2 columns --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                
                {{-- Stat Card 1: Total Seniors --}}
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A9.06 9.06 0 0 1 6 18.719m12 0a9.06 9.06 0 0 0-6-2.219m0 0a9.06 9.06 0 0 0-6 2.219m0 0m12 0a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 0 12 21c-2.17 0-4.207-.576-5.963-1.584A9.06 9.06 0 0 0 6 18.719M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Registered Seniors
                                </dt>
                                <dd class="text-3xl font-semibold text-gray-900">
                                    {{ $totalSeniors }}
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stat Card 2: New This Month --}}
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    New This Month
                                </dt>
                                <dd class="text-3xl font-semibold text-gray-900">
                                    {{ $newThisMonth }}
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 

            {{-- Recently Added Seniors Panel --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Recently Added Seniors
                    </h3>
                    
                    {{-- List of recent seniors --}}
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200">
                            @forelse ($recentSeniors as $citizen)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            {{-- Photo logic --}}
                                            @if($citizen->photo_image)
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $citizen->photo_image) }}" alt="{{ $citizen->name }}">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400" title="No photo">
                                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.375 3.375 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A1.75 1.75 0 0 1 18.25 22.5H5.75a1.75 1.75 0 0 1-1.249-2.382Z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $citizen->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                Registered: {{ $citizen->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="py-3 sm:py-4">
                                    <p class="text-sm text-gray-500 text-center">No senior citizens have been added yet.</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- "View All" Button Footer --}}
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex justify-end">
                            <a href="{{ route('senior-citizen.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                View All Records
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

