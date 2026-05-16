<x-app-layout>
    <div class="mb-lg">
        <h1 class="text-headline-md font-bold text-on-surface mb-xs">Scan Nota Baru</h1>
        <p class="text-body-lg text-on-surface-variant">Upload foto nota fisik untuk mengekstrak data transaksi secara otomatis dengan AI.</p>
    </div>

    @if (session('success'))
        <div class="mb-md p-md bg-green-500/10 border border-green-500/20 text-green-700 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-md p-md bg-red-500/10 border border-red-500/20 text-red-700 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
        <!-- Upload Form -->
        <div class="lg:col-span-2">
            <x-glass-card class="p-xl relative overflow-hidden" id="uploadCard">
                <form action="{{ route('upload.process') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    
                    <div class="border-2 border-dashed border-outline-variant rounded-2xl p-xl text-center hover:bg-surface-container/50 transition-colors duration-200 cursor-pointer" id="dropzone" onclick="document.getElementById('receipt_image').click()">
                        <input type="file" name="receipt_image" id="receipt_image" class="hidden" accept="image/jpeg,image/png,image/jpg" capture="environment" required>
                        
                        <div class="flex flex-col items-center justify-center space-y-md pointer-events-none" id="uploadPlaceholder">
                            <div class="w-20 h-20 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-title-md font-bold text-on-surface">Pilih Foto atau Tarik & Lepas</p>
                                <p class="text-body-sm text-on-surface-variant mt-xs">Mendukung JPG, JPEG, PNG (Maks. 5MB)</p>
                            </div>
                            <div class="flex gap-sm mt-sm pointer-events-auto">
                                <button type="button" class="btn btn-outline" onclick="event.stopPropagation(); document.getElementById('receipt_image').click()">Pilih dari Galeri</button>
                                <button type="button" class="btn btn-primary" onclick="event.stopPropagation(); triggerCamera()">Ambil Foto</button>
                            </div>
                        </div>

                        <!-- Preview Area (Hidden by default) -->
                        <div id="imagePreviewContainer" class="hidden flex flex-col items-center">
                            <img id="imagePreview" src="#" alt="Preview" class="max-h-64 rounded-xl shadow-md mb-md object-contain">
                            <p id="fileName" class="text-body-md font-medium text-on-surface mb-md"></p>
                            <div class="flex gap-sm pointer-events-auto">
                                <button type="button" class="btn btn-outline" onclick="resetForm()">Ganti Foto</button>
                                <button type="submit" class="btn btn-primary" id="processBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-xs inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09l2.846.813-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                    </svg>
                                    Proses dengan AI
                                </button>
                            </div>
                        </div>
                    </div>
                    @error('receipt_image')
                        <p class="text-error text-sm mt-2">{{ $message }}</p>
                    @enderror
                </form>

                <!-- Loading Overlay -->
                <div id="loadingOverlay" class="absolute inset-0 bg-surface/80 backdrop-blur-sm hidden flex-col items-center justify-center z-10 rounded-3xl">
                    <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-primary"></div>
                    <p class="text-title-lg font-bold text-primary mt-md">Memproses Nota...</p>
                    <p class="text-body-md text-on-surface-variant mt-xs">AI sedang mengekstrak data dari gambar, mohon tunggu.</p>
                </div>
            </x-glass-card>
            
            <div class="mt-lg p-xl bg-primary-container/30 rounded-3xl border border-primary-container/50">
                <h3 class="text-title-md font-bold text-on-surface mb-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-sm text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Tips Hasil Terbaik
                </h3>
                <ul class="list-disc pl-xl text-body-md text-on-surface space-y-xs">
                    <li>Pastikan pencahayaan cukup dan nota tidak buram (blur).</li>
                    <li>Ratakan nota agar tidak terlipat atau kusut.</li>
                    <li>Foto dari sudut tegak lurus (dari atas), bukan miring.</li>
                    <li>Pastikan teks nama barang, harga, dan total terlihat jelas.</li>
                </ul>
            </div>
        </div>

        <!-- History Sidebar -->
        <div class="lg:col-span-1">
            <x-glass-card class="p-xl h-full flex flex-col">
                <h2 class="text-title-lg font-bold text-on-surface mb-md">Riwayat Upload</h2>
                
                <div class="space-y-md flex-1 overflow-y-auto pr-sm custom-scrollbar">
                    @forelse($receipts as $receipt)
                        <div class="p-md rounded-xl border {{ $receipt->status === 'processed' ? 'border-primary/30 bg-primary/5' : ($receipt->status === 'failed' ? 'border-error/30 bg-error/5' : 'border-outline-variant bg-surface') }} flex gap-md items-center">
                            <img src="{{ Storage::url($receipt->image_path) }}" alt="Receipt" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1 min-w-0">
                                <p class="text-body-sm text-on-surface-variant">{{ $receipt->created_at->format('d M Y, H:i') }}</p>
                                <p class="text-label-md font-bold mt-1">
                                    @if($receipt->status === 'pending')
                                        <span class="text-on-surface-variant flex items-center"><span class="w-2 h-2 rounded-full bg-outline mr-1"></span> Menunggu diproses</span>
                                    @elseif($receipt->status === 'processed')
                                        <span class="text-primary flex items-center"><span class="w-2 h-2 rounded-full bg-primary mr-1"></span> Selesai OCR</span>
                                    @elseif($receipt->status === 'reviewed')
                                        <span class="text-green-600 flex items-center"><span class="w-2 h-2 rounded-full bg-green-500 mr-1"></span> Sudah Disimpan</span>
                                    @else
                                        <span class="text-error flex items-center"><span class="w-2 h-2 rounded-full bg-error mr-1"></span> Gagal Ekstrak</span>
                                    @endif
                                </p>
                            </div>
                            
                            @if($receipt->status === 'processed')
                                <a href="{{ route('review.show', $receipt->id) }}" class="btn btn-primary text-xs p-2 rounded-lg">Review</a>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-xl text-on-surface-variant">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto mb-sm opacity-50">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <p>Belum ada riwayat nota</p>
                        </div>
                    @endforelse
                </div>
            </x-glass-card>
        </div>
    </div>

    @push('scripts')
    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('receipt_image');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const fileName = document.getElementById('fileName');
        const uploadForm = document.getElementById('uploadForm');
        const loadingOverlay = document.getElementById('loadingOverlay');

        // Trigger camera
        function triggerCamera() {
            fileInput.setAttribute('capture', 'environment');
            fileInput.click();
        }

        // Handle file selection
        fileInput.addEventListener('change', function(e) {
            handleFile(this.files[0]);
        });

        // Handle drag and drop
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('bg-surface-container-highest', 'border-primary');
            dropzone.classList.remove('border-outline-variant');
        });

        dropzone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropzone.classList.remove('bg-surface-container-highest', 'border-primary');
            dropzone.classList.add('border-outline-variant');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('bg-surface-container-highest', 'border-primary');
            dropzone.classList.add('border-outline-variant');
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                handleFile(e.dataTransfer.files[0]);
            }
        });

        function handleFile(file) {
            if (!file) return;
            
            if (!file.type.match('image.*')) {
                alert('Tolong pilih file gambar (JPG, JPEG, PNG)');
                return;
            }
            
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file terlalu besar (Maks 5MB)');
                resetForm();
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                fileName.textContent = file.name;
                
                uploadPlaceholder.classList.add('hidden');
                imagePreviewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }

        function resetForm() {
            fileInput.value = '';
            uploadPlaceholder.classList.remove('hidden');
            imagePreviewContainer.classList.add('hidden');
            imagePreview.src = '#';
            fileName.textContent = '';
        }

        // Handle form submission
        uploadForm.addEventListener('submit', function() {
            loadingOverlay.classList.remove('hidden');
            loadingOverlay.classList.add('flex');
        });
    </script>
    @endpush
</x-app-layout>
