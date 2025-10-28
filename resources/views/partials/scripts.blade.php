<script>
    function seniorCitizenCrud() {
        return {
            // --- Modal Control ---
            createModalOpen: false,
            editModalOpen: false,
            viewModalOpen: false,
            deleteModalOpen: false,

            // --- Data Properties ---
            selectedCitizenId: null,
            citizenDetails: {},
            editFormData: {
                // Pre-populate with old() data for validation errors
                name: '{{ old('name') }}',
                email: '{{ old('email') }}',
                contact_number: '{{ old('contact_number') }}',
                address: '{{ old('address') }}',
                birth_date: '{{ old('birth_date') }}',
            },
            deleteFormAction: '',

            // --- Init Function ---
            init() {
                // Success alert timeout
                const alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 5000);
                }

                // Corrected validation error handling
                @if ($errors->any())
                    @if (old('form_type') === 'edit')
                        // If edit failed, reopen edit modal
                        this.selectedCitizenId = {{ old('citizen_id', 'null') }};
                        this.editModalOpen = true;
                    @else
                        // If create failed, reopen create modal
                        this.openCreateModal(false); // false = don't clear data
                    @endif
                @endif
            },

            // --- Modal Functions ---
            openCreateModal(clearData = true) {
                if (clearData) {
                    this.editFormData = {};
                }
                this.createModalOpen = true;
            },

            async openViewModal(id) {
                this.selectedCitizenId = id;
                await this.fetchCitizenDetails(id);
                this.viewModalOpen = true;
            },

            async openEditModal(id) {
                this.selectedCitizenId = id;
                
                // Only fetch new data if we are NOT reloading from a validation error
                @if (!$errors->any())
                    await this.fetchEditData(id);
                @endif

                this.editModalOpen = true;
            },

            openDeleteModal(id) {
                this.selectedCitizenId = id;
            
                this.deleteFormAction = `/senior-citizen/${id}`;
                
                this.deleteModalOpen = true;
            },
            openQrModal(id, name) {
                this.qrCodeName = name; 
                this.qrModalOpen = true;
                this.$nextTick(() => {
                    const qrElement = document.getElementById('qr-code-display');
                    qrElement.innerHTML = ''; 

                    const qrUrl = `{{ url('/') }}/senior-citizen/qr-profile/${id}`;
                    
                    new QRCode(qrElement, {
                        text: qrUrl,
                        width: 250,
                        height: 250,
                        colorDark : "#000000",
                        colorLight : "#ffffff",
                    });
                });
            },

            // --- Data Fetching Functions ---
            async fetchCitizenDetails(id) {
                try {
                    const response = await fetch(`/senior-citizen/${id}`);
                    if (!response.ok) throw new Error('Senior Citizen not found');
                    this.citizenDetails = await response.json();
                } catch (error) {
                    console.error('Error fetching Senior Citizen details:', error);
                }
            },

            async fetchEditData(id) {
                try {
                    const response = await fetch(`/senior-citizen/${id}`);
                    if (!response.ok) throw new Error('Senior Citizen not found');
                    this.editFormData = await response.json();
                } catch (error) {
                    console.error('Error fetching Senior Citizen data for edit:', error);
                }
            }
        };
    }
</script>