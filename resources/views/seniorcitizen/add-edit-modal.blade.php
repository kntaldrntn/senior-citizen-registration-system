{{-- Add/Edit Senior Citizen Modal --}}
<div x-show="createModalOpen || editModalOpen" x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        {{-- Background overlay for Create and Edit modals --}}
        <div
            x-show="createModalOpen || editModalOpen"
            @click="createModalOpen = false; editModalOpen = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"
            aria-hidden="true"
            style="display: none;"
        >
        </div>

        {{-- Modal panel --}}
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-800 shadow-xl rounded-2xl">

            <h3 class="text-2xl font-bold text-gray-900 dark:text-white"
                x-text="editModalOpen ? 'Edit Senior Citizen' : 'Add New Senior Citizen'">
            </h3>

            <form :action="editModalOpen ? '/senior-citizen/' + selectedCitizenId : '/senior-citizen'" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
                @csrf
                <template x-if="editModalOpen">
                    @method('PUT')
                </template>

                <input type="hidden" name="form_type" :value="editModalOpen ? 'edit' : 'create'">
                <template x-if="editModalOpen">
                    <input type="hidden" name="citizen_id" :value="selectedCitizenId">
                </template>
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                    <input type="text" name="name" id="name" :value="editFormData.name || ''"
                           class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email" :value="editFormData.email || ''"
                               class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    {{-- Contact Number --}}
                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Number</label>
                        <input type="tel" name="contact_number" id="contact_number" :value="editFormData.contact_number || ''"
                               class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                {{-- Address --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                    <textarea name="address" id="address" rows="3"
                              class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                              x-text="editFormData.address || ''"></textarea>
                </div>

                {{-- Birth Date --}}
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" :value="editFormData.birth_date || ''"
                           class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Photo Image --}}
                <div>
                    <label for="photo_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                    <input type="file" name="photo_image" id="photo_image"
                           class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                </div>

                {{-- Form Buttons --}}
                <div class="pt-4 flex justify-end space-x-3">
                    <button type="button" @click="createModalOpen = false; editModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700"
                            x-text="editModalOpen ? 'Save Changes' : 'Add Senior Citizen'">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>