{{-- View Senior Citizen Modal --}}
<div x-show="viewModalOpen" x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        {{-- Background overlay --}}
        <div x-show="viewModalOpen" @click="viewModalOpen = false"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75" aria-hidden="true">
        </div>

        {{-- Modal panel --}}
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div x-show="viewModalOpen"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block w-full max-w-3xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">

            <div class="flex justify-between items-center pb-3 border-b border-gray-200 dark:border-gray-700">
                {{-- Use 'citizenDetails' object and 'name' field --}}
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white" x-text="citizenDetails.name"></h3>
                <button @click="viewModalOpen = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    {{-- Use 'photo_image' and update placeholder --}}
                    <img class="w-full h-auto aspect-square rounded-lg shadow-lg object-cover bg-gray-700" 
                         :src="citizenDetails.photo_image ? '/storage/' + citizenDetails.photo_image : 'https://placehold.co/400x400/374151/e5e7eb?text=No+Photo'" 
                         alt="Profile Photo">
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Senior Citizen Details</h4>
                    
                    {{-- Use a definition list for key-value pairs --}}
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</dt>
                            <dd class="text-sm text-gray-900 dark:text-white col-span-2" x-text="citizenDetails.email"></dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Contact Number</dt>
                            <dd class="text-sm text-gray-900 dark:text-white col-span-2" x-text="citizenDetails.contact_number"></dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Birth Date</dt>
                            <dd class="text-sm text-gray-900 dark:text-white col-span-2" x-text="citizenDetails.birth_date"></dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</dt>
                            <dd class="text-sm text-gray-900 dark:text-white col-span-2" x-text="citizenDetails.address"></dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6 text-right">
                <button type="button" @click="viewModalOpen = false"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>