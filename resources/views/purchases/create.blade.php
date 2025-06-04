<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 rounded-full p-3 mr-4">
                       
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl text-white leading-tight">
                            {{ __('Create New Purchase') }}
                        </h2>
                        <p class="text-gray-500 mt-1">Add plants to your customer's purchase order</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4 text-emerald-100">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Purchase Details
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Fill in the information below to create a new purchase order</p>
            </div>

            <form action="{{ route('purchases.store') }}" method="POST" class="p-8">
                @csrf

                {{-- Customer Selection Card --}}
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-750 rounded-xl p-6 mb-8 border border-blue-100 dark:border-gray-600">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-500 rounded-full p-2 mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Customer Information</h4>
                    </div>
                    
                    <label for="customer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Select Customer <span class="text-red-500">*</span>
                    </label>
                    <select name="customer_id" id="customer_id" required
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 shadow-sm">
                        <option value="">Choose a customer...</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="flex items-center mt-2 text-red-600">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                {{-- Plants Selection Card --}}
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-750 rounded-xl p-6 border border-green-100 dark:border-gray-600">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="bg-green-500 rounded-full p-2 mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Plant Selection</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Add plants and specify quantities</p>
                            </div>
                        </div>
                        <button type="button" onclick="addPlantRow()"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r px-4 py-2 bg-red-600 text-white rounded-md hover:bg-green-700 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Plant
                        </button>
                    </div>

                    <div id="plant-container" class="space-y-4">
                        <div class="plant-row bg-white dark:bg-gray-800 rounded-lg p-4 border-2 border-gray-200 dark:border-gray-600 shadow-sm">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                                <div class="md:col-span-6">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Plant <span class="text-red-500">*</span>
                                    </label>
                                    <select name="plant_ids[]" required
                                        class="w-full px-3 py-2.5 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                        <option value="">Select a plant...</option>
                                        @foreach($plants as $plant)
                                            <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Quantity <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="quantities[]" min="1" value="1" required
                                        class="w-full px-3 py-2.5 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200" />
                                </div>

                                <div class="md:col-span-3">
                                    <button type="button" onclick="removePlantRow(this)"
                                        class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-gradient-to-r px-4 py-2 bg-red-600 text-white rounded-md hover:bg-green-700 text-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('purchases.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r bg-gradient-to-r px-4 py-2 bg-red-600 text-white rounded-md hover:bg-blue-700 text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r bg-gradient-to-r px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Purchase
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Enhanced JavaScript --}}
    <script>
        let plantRowCount = 1;

        function addPlantRow() {
            const container = document.getElementById('plant-container');
            const row = document.createElement('div');
            row.classList.add('plant-row', 'bg-white', 'dark:bg-gray-800', 'rounded-lg', 'p-4', 'border-2', 'border-gray-200', 'dark:border-gray-600', 'shadow-sm', 'animate-fadeIn');
            
            plantRowCount++;

            row.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Plant <span class="text-red-500">*</span>
                        </label>
                        <select name="plant_ids[]" required
                            class="w-full px-3 py-2.5 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                            <option value="">Select a plant...</option>
                            @foreach($plants as $plant)
                                <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Quantity <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="quantities[]" min="1" value="1" required
                            class="w-full px-3 py-2.5 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200" />
                    </div>

                    <div class="md:col-span-3">
                        <button type="button" onclick="removePlantRow(this)"
                            class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-gradient-to-r px-4 py-2 bg-red-600 text-white rounded-md hover:bg-green-700 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Remove
                        </button>
                    </div>
                </div>
            `;
            
            container.appendChild(row);
            
            // Add smooth entrance animation
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, 10);
        }

        function removePlantRow(button) {
            const plantRows = document.querySelectorAll('.plant-row');
            if (plantRows.length > 1) {
                const row = button.closest('.plant-row');
                row.style.opacity = '0';
                row.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    row.remove();
                }, 200);
            } else {
                // Show a subtle notification that at least one plant is required
                button.classList.add('animate-pulse');
                setTimeout(() => {
                    button.classList.remove('animate-pulse');
                }, 1000);
            }
        }

        // Add custom CSS for animations
        const style = document.createElement('style');
        style.textContent = `
            .animate-fadeIn {
                opacity: 0;
                transform: translateY(-10px);
                transition: all 0.3s ease-out;
            }
            
            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }
            
            .animate-pulse {
                animation: pulse 1s ease-in-out;
            }
        `;
        document.head.appendChild(style);
    </script>
</x-app-layout>