<x-app-layout>
    <x-slot name="title">Transaksi</x-slot>
    
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-lg">
        <div>
            <h2 class="font-title-lg text-title-lg text-on-surface mb-xs">Data Transaksi</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Kelola pengeluaran dan pemasukan usaha Anda.</p>
        </div>
        <div class="flex gap-sm w-full md:w-auto">
            <button x-data @click="$dispatch('open-modal', 'add-transaction-modal')" class="w-full md:w-auto px-md py-sm rounded-lg bg-primary text-on-primary font-label-md text-label-md flex justify-center items-center gap-xs shadow-lg shadow-primary/20 hover:bg-surface-tint transition-colors">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Catat Transaksi
            </button>
        </div>
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

    <!-- Filters & Search -->
    <x-glass-card class="p-md mb-lg">
        <form action="{{ route('transaksi') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-md items-end">
            <div class="md:col-span-2">
                <label class="block text-label-sm text-on-surface-variant mb-1">Cari Transaksi</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari deskripsi..." class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 py-2 text-on-surface">
                </div>
            </div>
            
            <div>
                <label class="block text-label-sm text-on-surface-variant mb-1">Kategori</label>
                <select name="category_id" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-label-sm text-on-surface-variant mb-1">Tipe</label>
                <select name="type" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2 text-on-surface">
                    <option value="">Semua Tipe</option>
                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            
            <div class="flex gap-2">
                <button type="submit" class="flex-1 btn btn-primary py-2 px-4 rounded-lg">Filter</button>
                <a href="{{ route('transaksi') }}" class="btn btn-outline py-2 px-4 rounded-lg flex justify-center items-center" title="Reset">
                    <span class="material-symbols-outlined text-[20px]">restart_alt</span>
                </a>
            </div>
        </form>
    </x-glass-card>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-lg">
        <!-- Table Section -->
        <div class="xl:col-span-2">
            <x-glass-card class="overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-body-md text-on-surface border-collapse">
                        <thead class="bg-surface-container border-b border-outline-variant">
                            <tr>
                                <th class="p-md font-bold text-on-surface">Tanggal</th>
                                <th class="p-md font-bold text-on-surface">Kategori</th>
                                <th class="p-md font-bold text-on-surface">Deskripsi</th>
                                <th class="p-md font-bold text-on-surface text-right">Jumlah</th>
                                <th class="p-md font-bold text-on-surface text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant">
                            @forelse($transactions as $trx)
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md whitespace-nowrap">{{ \Carbon\Carbon::parse($trx->transaction_date)->format('d M Y') }}</td>
                                <td class="p-md">
                                    <div class="flex items-center gap-xs">
                                        <span class="w-3 h-3 rounded-full" style="background-color: {{ $trx->category->color ?? '#ccc' }}"></span>
                                        {{ $trx->category->name ?? '-' }}
                                    </div>
                                </td>
                                <td class="p-md">
                                    {{ $trx->description }}
                                    @if($trx->source === 'ocr')
                                        <span class="ml-xs inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-primary/10 text-primary">AI</span>
                                    @endif
                                </td>
                                <td class="p-md text-right font-medium {{ $trx->type === 'income' ? 'text-green-600' : 'text-on-surface' }}">
                                    {{ $trx->type === 'income' ? '+' : '-' }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                </td>
                                <td class="p-md text-center">
                                    <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <!-- Edit Button -->
                                        <button 
                                            x-data
                                            @click="$dispatch('open-modal', 'edit-transaction-modal'); $dispatch('set-edit-data', {{ json_encode($trx) }})"
                                            class="p-2 text-on-surface-variant hover:text-primary transition-colors"
                                            title="Edit"
                                        >
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        
                                        <!-- Delete Form -->
                                        <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-on-surface-variant hover:text-error transition-colors" title="Hapus">
                                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-xl text-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-[48px] mb-xs opacity-50">receipt_long</span>
                                    <p>Belum ada transaksi yang ditemukan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($transactions->hasPages())
                <div class="p-md border-t border-outline-variant bg-surface-container-lowest">
                    {{ $transactions->links() }}
                </div>
                @endif
            </x-glass-card>
        </div>

        <!-- Chart Section -->
        <div class="xl:col-span-1">
            <x-glass-card class="p-lg h-full flex flex-col min-h-[400px]">
                <div class="flex justify-between items-center mb-md">
                    <h3 class="font-title-lg text-title-lg text-on-surface">Proporsi Transaksi</h3>
                </div>
                <div class="flex-1 relative w-full h-full min-h-[300px]">
                    <canvas id="bubbleChart"></canvas>
                </div>
                <p class="text-body-sm text-on-surface-variant text-center mt-sm">30 hari terakhir. Ukuran bubble merepresentasikan besar nominal.</p>
            </x-glass-card>
        </div>
    </div>

    <!-- Modals (AlpineJS driven via Breeze x-modal component if available, or custom) -->
    
    <!-- Add Transaction Modal -->
    <x-modal name="add-transaction-modal" focusable>
        <div class="p-lg">
            <h2 class="text-title-lg font-bold text-on-surface mb-md">Tambah Transaksi Baru</h2>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="space-y-md">
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Tipe Transaksi</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="type" value="expense" checked class="text-primary focus:ring-primary">
                                <span>Pengeluaran</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="type" value="income" class="text-primary focus:ring-primary">
                                <span>Pemasukan</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Kategori</label>
                        <select name="category_id" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Jumlah (Rp)</label>
                        <input type="number" name="amount" required min="0" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Deskripsi</label>
                        <input type="text" name="description" required maxlength="255" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Tanggal</label>
                        <input type="date" name="transaction_date" required value="{{ date('Y-m-d') }}" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>
                </div>
                
                <div class="mt-lg flex justify-end gap-sm">
                    <button type="button" x-on:click="$dispatch('close')" class="btn btn-outline py-2 px-4 rounded-lg">Batal</button>
                    <button type="submit" class="btn btn-primary py-2 px-4 rounded-lg">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Edit Transaction Modal -->
    <x-modal name="edit-transaction-modal" focusable>
        <div class="p-lg" x-data="{
            trx: {
                id: '',
                type: 'expense',
                category_id: '',
                amount: '',
                description: '',
                transaction_date: ''
            }
        }" @set-edit-data.window="
            trx.id = $event.detail.id;
            trx.type = $event.detail.type;
            trx.category_id = $event.detail.category_id;
            trx.amount = $event.detail.amount;
            trx.description = $event.detail.description;
            trx.transaction_date = $event.detail.transaction_date;
        ">
            <h2 class="text-title-lg font-bold text-on-surface mb-md">Edit Transaksi</h2>
            <form :action="`/transaksi/${trx.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-md">
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Tipe Transaksi</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="type" value="expense" x-model="trx.type" class="text-primary focus:ring-primary">
                                <span>Pengeluaran</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="type" value="income" x-model="trx.type" class="text-primary focus:ring-primary">
                                <span>Pemasukan</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Kategori</label>
                        <select name="category_id" x-model="trx.category_id" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Jumlah (Rp)</label>
                        <input type="number" name="amount" x-model="trx.amount" required min="0" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Deskripsi</label>
                        <input type="text" name="description" x-model="trx.description" required maxlength="255" class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-label-md font-medium text-on-surface mb-1">Tanggal</label>
                        <input type="date" name="transaction_date" x-model="trx.transaction_date" required class="w-full bg-surface-container border border-outline focus:border-primary focus:ring-1 focus:ring-primary rounded-lg px-4 py-2">
                    </div>
                </div>
                
                <div class="mt-lg flex justify-end gap-sm">
                    <button type="button" x-on:click="$dispatch('close')" class="btn btn-outline py-2 px-4 rounded-lg">Batal</button>
                    <button type="submit" class="btn btn-primary py-2 px-4 rounded-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </x-modal>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rawData = @json($chartData);
            
            // Format data for Chart.js Bubble Chart
            const datasets = [];
            
            // Group by category to give them different colors
            const groupedData = {};
            rawData.forEach(item => {
                if(!groupedData[item.category]) {
                    groupedData[item.category] = {
                        label: item.category,
                        data: [],
                        backgroundColor: item.type === 'income' ? 'rgba(34, 197, 94, 0.5)' : 'rgba(239, 68, 68, 0.5)',
                        borderColor: item.type === 'income' ? 'rgb(34, 197, 94)' : 'rgb(239, 68, 68)',
                    };
                }
                
                groupedData[item.category].data.push({
                    x: item.x,
                    y: item.y,
                    r: item.r,
                    description: item.description,
                    type: item.type
                });
            });
            
            for(let key in groupedData) {
                datasets.push(groupedData[key]);
            }

            const ctx = document.getElementById('bubbleChart').getContext('2d');
            
            if(datasets.length === 0) {
                // Render empty state if no data
                ctx.font = '14px Arial';
                ctx.fillStyle = '#6b7280';
                ctx.textAlign = 'center';
                ctx.fillText('Data belum cukup untuk divisualisasikan', ctx.canvas.width / 2, ctx.canvas.height / 2);
                return;
            }

            new Chart(ctx, {
                type: 'bubble',
                data: {
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const item = context.raw;
                                    const amount = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.y);
                                    const date = new Date(item.x).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
                                    return `${item.description} (${date}): ${amount}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            ticks: {
                                callback: function(value) {
                                    return new Date(value).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
                                }
                            },
                            title: {
                                display: true,
                                text: 'Tanggal'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nominal (Rp)'
                            },
                            ticks: {
                                callback: function(value) {
                                    if(value >= 1000000) return (value/1000000).toFixed(1) + 'M';
                                    if(value >= 1000) return (value/1000).toFixed(0) + 'K';
                                    return value;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>