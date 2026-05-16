<x-app-layout>
    <x-slot name="title">Pengaturan Usaha</x-slot>

    <div class="mb-lg">
        <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Pengaturan Usaha</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">Kelola profil usaha dan sesuaikan kategori transaksi Anda.</p>
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

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-lg">
        <!-- Profil Usaha -->
        <div>
            <x-glass-card class="p-lg">
                <h3 class="font-title-lg text-title-lg text-on-surface mb-md">Profil Usaha</h3>
                
                <form action="{{ route('pengaturan.profil.update') }}" method="POST">
                    @csrf
                    <div class="space-y-md">
                        <div>
                            <label class="block text-label-md font-medium text-on-surface mb-1">Nama Usaha</label>
                            <input type="text" name="name" value="{{ old('name', $business->name) }}" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                            @error('name') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-label-md font-medium text-on-surface mb-1">Jenis Usaha</label>
                            <select name="type" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                                <option value="warung" {{ old('type', $business->type) == 'warung' ? 'selected' : '' }}>Warung Makan / Cafe</option>
                                <option value="toko" {{ old('type', $business->type) == 'toko' ? 'selected' : '' }}>Toko Kelontong / Ritel</option>
                                <option value="jasa" {{ old('type', $business->type) == 'jasa' ? 'selected' : '' }}>Jasa (Laundry, Bengkel, dll)</option>
                                <option value="lainnya" {{ old('type', $business->type) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('type') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-label-md font-medium text-on-surface mb-1">No. Telepon (Opsional)</label>
                            <input type="text" name="phone" value="{{ old('phone', $business->phone) }}" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                            @error('phone') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-label-md font-medium text-on-surface mb-1">Alamat (Opsional)</label>
                            <textarea name="address" rows="3" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">{{ old('address', $business->address) }}</textarea>
                            @error('address') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="pt-sm">
                            <button type="submit" class="w-full btn btn-primary py-2 rounded-lg">Simpan Profil Usaha</button>
                        </div>
                    </div>
                </form>
            </x-glass-card>
        </div>

        <!-- Manajemen Kategori -->
        <div>
            <x-glass-card class="p-lg mb-lg">
                <h3 class="font-title-lg text-title-lg text-on-surface mb-xs">Daftar Kategori</h3>
                <p class="text-body-sm text-on-surface-variant mb-md">Kategori digunakan untuk mengelompokkan transaksi Anda.</p>
                
                <div class="max-h-[300px] overflow-y-auto pr-2 custom-scrollbar space-y-2 mb-md">
                    @forelse($categories as $category)
                        <div class="flex items-center justify-between p-sm border border-outline-variant rounded-lg bg-surface-container-lowest">
                            <div class="flex items-center gap-sm">
                                <span class="w-4 h-4 rounded-full" style="background-color: {{ $category->color ?? '#ccc' }}"></span>
                                <div>
                                    <span class="font-medium text-on-surface block">{{ $category->name }}</span>
                                    <span class="text-xs {{ $category->type == 'income' ? 'text-green-600' : 'text-error' }}">{{ $category->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</span>
                                </div>
                            </div>
                            
                            @if(!$category->is_default)
                                <form action="{{ route('pengaturan.kategori.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-on-surface-variant hover:text-error transition-colors" title="Hapus">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-on-surface-variant bg-surface-container-highest px-2 py-1 rounded">Bawaan</span>
                            @endif
                        </div>
                    @empty
                        <p class="text-center text-on-surface-variant text-sm py-4">Belum ada kategori.</p>
                    @endforelse
                </div>
            </x-glass-card>

            <x-glass-card class="p-lg">
                <h3 class="font-title-md text-title-md text-on-surface mb-md">Tambah Kategori Baru</h3>
                
                <form action="{{ route('pengaturan.kategori.store') }}" method="POST">
                    @csrf
                    <div class="space-y-md">
                        <div class="grid grid-cols-2 gap-sm">
                            <div class="col-span-2">
                                <label class="block text-label-md font-medium text-on-surface mb-1">Nama Kategori</label>
                                <input type="text" name="name" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface" placeholder="Contoh: Beli Air Galon">
                            </div>
                            
                            <div>
                                <label class="block text-label-md font-medium text-on-surface mb-1">Tipe</label>
                                <select name="type" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                                    <option value="expense">Pengeluaran</option>
                                    <option value="income">Pemasukan</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-label-md font-medium text-on-surface mb-1">Warna Label</label>
                                <input type="color" name="color" value="#4ade80" class="w-full h-[42px] bg-surface-container border border-outline rounded-lg cursor-pointer p-1">
                            </div>
                        </div>
                        
                        <div class="pt-xs">
                            <button type="submit" class="w-full btn btn-outline py-2 rounded-lg flex justify-center items-center gap-xs">
                                <span class="material-symbols-outlined text-[18px]">add</span> Tambah Kategori
                            </button>
                        </div>
                    </div>
                </form>
            </x-glass-card>
        </div>
    </div>
</x-app-layout>
