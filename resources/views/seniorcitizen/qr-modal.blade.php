{{-- QR Code Modal --}}
<div x-show="qrModalOpen" x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        {{-- Background overlay --}}
        <div @click="qrModalOpen = false"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true">
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        {{-- Modal panel --}}
        <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block w-full max-w-sm p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">

            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <h3 class="text-xl font-medium text-gray-900" x-text="qrCodeName"></h3>
                <button @click="qrModalOpen = false" class="text-gray-400 hover:text-gray-600">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>

            <div class="mt-4 flex flex-col items-center justify-center space-y-3">
                <!-- This div will hold the QR code -->
                <div id="qr-code-display" class="p-4 bg-white rounded-lg">
                    <!-- QR Code will be generated here by the script -->
                </div>
                <p class="text-sm text-gray-500">Scan this code for a digital profile.</p>
            </div>

            <div class="mt-5 text-right">
                <button type="button" @click="qrModalOpen = false"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
