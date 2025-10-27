<div class="bg-gray-800 shadow-xl rounded-lg overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-750">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Photo
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Contact Info
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Address
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Birth Date
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @forelse ($seniorcitizens as $citizen)
                <tr class="hover:bg-gray-750 transition duration-150 ease-in-out">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($citizen->photo_image)
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/' . $citizen->photo_image) }}" alt="{{ $citizen->name }}">
                        @else
                            {{-- Placeholder for no photo --}}
                            <div class="h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center text-gray-400" title="No photo">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A1.75 1.75 0 0 1 18.25 22.5H5.75a1.75 1.75 0 0 1-1.249-2.382Z" />
                                </svg>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-100">{{ $citizen->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-100">{{ $citizen->email }}</div>
                        <div class="text-sm text-gray-400">{{ $citizen->contact_number }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-100 max-w-xs truncate" title="{{ $citizen->address }}">
                        {{ $citizen->address }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        {{ \Carbon\Carbon::parse($citizen->birth_date)->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button @click="openViewModal({{ $citizen->id }})" class="text-indigo-400 hover:text-indigo-600 p-1" title="View">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.18l.879-.657a1.651 1.651 0 0 0 0-2.318l-.879-.657a1.651 1.651 0 0 1 0-1.18l1.62-1.215a1.65 1.65 0 0 0 1.948 0l1.19-.894a1.651 1.651 0 0 1 2.318 0l1.19.894a1.65 1.65 0 0 0 1.948 0l1.62 1.215a1.651 1.651 0 0 1 0 1.18l-.879.657a1.651 1.651 0 0 0 0 2.318l.879.657a1.651 1.651 0 0 1 0 1.18l-1.62 1.215a1.65 1.65 0 0 0-1.948 0l-1.19.894a1.651 1.651 0 0 1-2.318 0l-1.19-.894a1.65 1.65 0 0 0-1.948 0L.664 10.59ZM10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button @click="openEditModal({{ $citizen->id }})" class="text-blue-400 hover:text-blue-600 p-1 ml-2" title="Edit">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a.5.5 0 0 0 .14-.086l10.012-10.011a.5.5 0 0 0 0-.707L13.232 3.232a.5.5 0 0 0-.707 0L2.518 13.244a.5.5 0 0 0-.086.14l-.237.593Zm12.332-12.332 1.262-1.262a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1 0 .707l-1.262 1.262M11.03 11.03 10 12l.97.97 4.172-4.172-1.94-1.94-4.172 4.172Z" />
                            </svg>
                        </button>
                        <button @click="openDeleteModal({{ $citizen->id }})" class="text-red-400 hover:text-red-600 p-1 ml-2" title="Delete">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 0 0-.7.707v1.262c0 .261.12.508.33.66l2.1 1.291c.12.074.253.11.388.11h11.196c.135 0 .268-.036.388-.11l2.1-1.291a.75.75 0 0 0 .33-.66V5.198a.75.75 0 0 0-.7-.707A50.09 50.09 0 0 0 14 4.193v-.443A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.5.66 1.5 1.5V5h-3v-.5C8.5 4.66 9.16 4 10 4ZM6.03 7.5a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Zm3.72 0a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Zm3.75 0a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        <div class="flex flex-col items-center">
                            {{-- Empty state icon --}}
                            <svg class="w-12 h-12 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A9.06 9.06 0 0 1 6 18.719m12 0a9.06 9.06 0 0 0-6-2.219m0 0a9.06 9.06 0 0 0-6 2.219m0 0m12 0a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 0 12 21c-2.17 0-4.207-.576-5.963-1.584A9.06 9.06 0 0 0 6 18.719M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <p class="mt-3 text-lg font-medium">No senior citizens found.</p>
                            <p class="mt-1 text-sm text-gray-500">Get started by clicking "Add New Senior Citizen".</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Links --}}
    @if ($seniorcitizens->hasPages())
        <div class="bg-gray-800 px-4 py-3 sm:px-6 border-t border-gray-700">
            {{ $seniorcitizens->links() }}
        </div>
    @endif
</div>