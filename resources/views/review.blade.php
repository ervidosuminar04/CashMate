<x-app-layout>
    <div class="mb-lg flex justify-between items-end">
        <div>
            <h1 class="text-headline-md font-bold text-on-surface mb-xs">Review Hasil AI</h1>
            <p class="text-body-lg text-on-surface-variant">Periksa dan sesuaikan data transaksi yang diekstrak dari nota sebelum disimpan.</p>
        </div>
        <a href="{{ route('upload') }}" class="btn btn-outline">Batal</a>
    </div>

    @if (session('error'))
        <div class="mb-md p-md bg-red-500/10 border border-red-500/20 text-red-700 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('review.approve', $receipt->id) }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-lg">
            <!-- Left Column: Receipt Image -->
            <div>
                <x-glass-card class="p-lg h-full">
                    <h3 class="text-title-md font-bold text-on-surface mb-md">Foto Nota Asli</h3>
                    <div class="rounded-xl overflow-hidden border border-outline-variant bg-surface-container flex items-center justify-center min-h-[400px]">
                        <img src="{{ Storage::url($receipt->image_path) }}" alt="Receipt" class="max-w-full max-h-[600px] object-contain cursor-zoom-in hover:scale-105 transition-transform duration-300" onclick="window.open(this.src, '_blank')">
                    </div>
                    <p class="text-body-sm text-center text-on-surface-variant mt-sm">Klik gambar untuk memperbesar</p>
                </x-glass-card>
            </div>

            <!-- Right Column: Extracted Data -->
            <div>
                <x-glass-card class="p-xl h-full flex flex-col">
                    <h3 class="text-title-md font-bold text-on-surface mb-md">Item Terdeteksi</h3>
                    
                    <div class="flex-1 overflow-y-auto pr-xs custom-scrollbar space-y-md" id="itemsContainer">
                        @php
                            $items = is_array($receipt->extracted_data) ? $receipt->extracted_data : [];
                            if (isset($items['items'])) {
                                $items = $items['items']; // In case AI returns { items: [...] }
                            }
                        @endphp

                        @if(empty($items))
                            <div class="p-lg text-center bg-error-container text-on-error-container rounded-xl">
                                <p class="font-bold">Oops! AI tidak menemukan item yang jelas.</p>
                                <p class="text-sm mt-xs">Silakan tambahkan item secara manual di bawah ini.</p>
                            </div>
                        @endif

                        @foreach($items as $index => $item)
                            <div class="p-md border border-outline-variant rounded-xl bg-surface relative item-row" data-index="{{ $index }}">
                                <button type="button" class="absolute top-2 right-2 text-on-surface-variant hover:text-error transition-colors" onclick="removeItem(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-md mt-sm">
                                    <div class="md:col-span-2">
                                        <label class="block text-label-md font-medium text-on-surface mb-1">Nama Item</label>
                                        <input type="text" name="items[{{ $index }}][item_name]" value="{{ $item['item_name'] ?? '' }}" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface" required>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-label-md font-medium text-on-surface mb-1">Kategori</label>
                                        <select name="items[{{ $index }}][category_id]" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ ($category->name === 'Operasional' || str_contains(strtolower($item['item_name'] ?? ''), strtolower($category->name))) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 gap-sm">
                                        <div>
                                            <label class="block text-label-md font-medium text-on-surface mb-1">Qty</label>
                                            <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] ?? 1 }}" min="1" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface quantity-input" required onchange="calculateTotal(this)">
                                        </div>
                                        <div>
                                            <label class="block text-label-md font-medium text-on-surface mb-1">Harga Satuan</label>
                                            <input type="number" name="items[{{ $index }}][unit_price]" value="{{ $item['unit_price'] ?? 0 }}" min="0" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface price-input" required onchange="calculateTotal(this)">
                                        </div>
                                    </div>
                                    
                                    <div class="md:col-span-2 border-t border-outline-variant pt-sm mt-xs flex justify-between items-center">
                                        <span class="text-label-md font-medium text-on-surface-variant">Total Harga:</span>
                                        <input type="number" name="items[{{ $index }}][total_price]" value="{{ $item['total_price'] ?? 0 }}" min="0" class="bg-transparent border-none text-right font-bold text-title-md text-on-surface p-0 focus:ring-0 w-32 total-input" required readonly>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-md pt-md border-t border-outline-variant">
                        <button type="button" class="w-full btn btn-outline mb-md flex justify-center items-center" onclick="addNewItem()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-xs">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Baris Manual
                        </button>

                        <div class="flex justify-between items-end mb-md">
                            <span class="text-title-md font-bold text-on-surface">Total Keseluruhan:</span>
                            <span class="text-headline-md font-bold text-primary" id="grandTotalLabel">Rp 0</span>
                        </div>
                        
                        <button type="submit" class="w-full btn btn-primary py-3 text-title-sm font-bold">Simpan sebagai Transaksi</button>
                    </div>
                </x-glass-card>
            </div>
        </div>
    </form>

    <!-- Template for new item -->
    <template id="itemTemplate">
        <div class="p-md border border-outline-variant rounded-xl bg-surface relative item-row mb-md">
            <button type="button" class="absolute top-2 right-2 text-on-surface-variant hover:text-error transition-colors" onclick="removeItem(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-md mt-sm">
                <div class="md:col-span-2">
                    <label class="block text-label-md font-medium text-on-surface mb-1">Nama Item</label>
                    <input type="text" name="items[__INDEX__][item_name]" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface" required>
                </div>
                
                <div>
                    <label class="block text-label-md font-medium text-on-surface mb-1">Kategori</label>
                    <select name="items[__INDEX__][category_id]" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-sm">
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Qty</label>
                        <input type="number" name="items[__INDEX__][quantity]" value="1" min="1" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface quantity-input" required onchange="calculateTotal(this)">
                    </div>
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Harga Satuan</label>
                        <input type="number" name="items[__INDEX__][unit_price]" value="0" min="0" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface price-input" required onchange="calculateTotal(this)">
                    </div>
                </div>
                
                <div class="md:col-span-2 border-t border-outline-variant pt-sm mt-xs flex justify-between items-center">
                    <span class="text-label-md font-medium text-on-surface-variant">Total Harga:</span>
                    <input type="number" name="items[__INDEX__][total_price]" value="0" min="0" class="bg-transparent border-none text-right font-bold text-title-md text-on-surface p-0 focus:ring-0 w-32 total-input" required readonly>
                </div>
            </div>
        </div>
    </template>

    @push('scripts')
    <script>
        let itemIndex = {{ count($items ?? []) }};
        
        function updateGrandTotal() {
            let total = 0;
            document.querySelectorAll('.total-input').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            
            // Format to IDR
            document.getElementById('grandTotalLabel').textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(total);
        }

        function calculateTotal(element) {
            const row = element.closest('.item-row');
            const qty = parseFloat(row.querySelector('.quantity-input').value) || 0;
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            
            const totalInput = row.querySelector('.total-input');
            totalInput.value = qty * price;
            
            updateGrandTotal();
        }

        function removeItem(button) {
            const row = button.closest('.item-row');
            row.remove();
            updateGrandTotal();
            
            // Show empty state if all removed
            if (document.querySelectorAll('.item-row').length === 0) {
                // Could add an empty state message here
            }
        }

        function addNewItem() {
            const container = document.getElementById('itemsContainer');
            const template = document.getElementById('itemTemplate').innerHTML;
            
            const html = template.replace(/__INDEX__/g, itemIndex);
            
            // Remove empty state message if it exists
            const emptyMessage = container.querySelector('.bg-error-container');
            if (emptyMessage) {
                emptyMessage.remove();
            }
            
            container.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }

        // Initialize total on load
        document.addEventListener('DOMContentLoaded', function() {
            updateGrandTotal();
        });
    </script>
    @endpush
</x-app-layout>
