<x-app-layout>
    <x-slot name="title">Dashboard - {{ $business->name }}</x-slot>

    <div class="space-y-lg">
        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-md">
            <div>
                <h1 class="font-display-xl text-headline-lg text-on-surface">Halo, {{ Auth::user()->name }} 👋</h1>
                <p class="text-on-surface-variant">Pantau kesehatan finansial <strong>{{ $business->name }}</strong> hari ini.</p>
            </div>
            <div class="flex items-center gap-sm">
                <a href="{{ route('upload') }}" class="btn-primary flex items-center gap-xs">
                    <span class="material-symbols-outlined">add_a_photo</span>
                    Upload Nota
                </a>
                <a href="{{ route('transaksi') }}" class="btn-secondary flex items-center gap-xs">
                    <span class="material-symbols-outlined">add</span>
                    Catat Manual
                </a>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            <!-- Balance Card -->
            <div class="glass-panel p-lg bg-primary-container/10 border-primary/20 relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
                <div class="relative z-10">
                    <span class="text-label-md text-primary font-semibold uppercase tracking-wider">Saldo Saat Ini</span>
                    <h2 class="font-display-xl text-display-md text-on-surface mt-xs">
                        Rp {{ number_format($summary['balance'], 0, ',', '.') }}
                    </h2>
                    <div class="flex items-center gap-xs mt-sm text-sm {{ $summary['balance'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        <span class="material-symbols-outlined text-[18px]">{{ $summary['balance'] >= 0 ? 'trending_up' : 'trending_down' }}</span>
                        <span>Update Realtime</span>
                    </div>
                </div>
            </div>

            <!-- Income Card -->
            <div class="glass-panel p-lg relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-500/10 rounded-full blur-2xl group-hover:bg-green-500/20 transition-all"></div>
                <div class="relative z-10">
                    <span class="text-label-md text-on-surface-variant font-semibold uppercase tracking-wider">Total Pemasukan</span>
                    <h2 class="font-display-xl text-headline-lg text-green-600 mt-xs">
                        Rp {{ number_format($summary['total_income'], 0, ',', '.') }}
                    </h2>
                    <div class="flex items-center gap-xs mt-sm text-on-surface-variant text-sm">
                        <span class="material-symbols-outlined text-[18px] text-green-500">arrow_upward</span>
                        <span>Bulan ini</span>
                    </div>
                </div>
            </div>

            <!-- Expense Card -->
            <div class="glass-panel p-lg relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-500/10 rounded-full blur-2xl group-hover:bg-red-500/20 transition-all"></div>
                <div class="relative z-10">
                    <span class="text-label-md text-on-surface-variant font-semibold uppercase tracking-wider">Total Pengeluaran</span>
                    <h2 class="font-display-xl text-headline-lg text-red-600 mt-xs">
                        Rp {{ number_format($summary['total_expense'], 0, ',', '.') }}
                    </h2>
                    <div class="flex items-center gap-xs mt-sm text-on-surface-variant text-sm">
                        <span class="material-symbols-outlined text-[18px] text-red-500">arrow_downward</span>
                        <span>Bulan ini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
            <!-- Cashflow Chart -->
            <div class="lg:col-span-2 glass-panel p-lg flex flex-col">
                <div class="flex items-center justify-between mb-lg">
                    <h3 class="font-headline-md text-on-surface">Arus Kas (6 Bulan Terakhir)</h3>
                    <div class="flex items-center gap-md">
                        <div class="flex items-center gap-xs">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <span class="text-xs text-on-surface-variant">Pemasukan</span>
                        </div>
                        <div class="flex items-center gap-xs">
                            <span class="w-3 h-3 rounded-full bg-secondary"></span>
                            <span class="text-xs text-on-surface-variant">Pengeluaran</span>
                        </div>
                    </div>
                </div>
                <div class="relative h-[300px] w-full flex-grow">
                    <canvas id="cashflowChart"></canvas>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="glass-panel p-lg">
                <div class="flex items-center justify-between mb-lg">
                    <h3 class="font-headline-md text-on-surface">Transaksi Terbaru</h3>
                    <a href="{{ route('transaksi') }}" class="text-sm text-primary hover:underline font-semibold">Lihat Semua</a>
                </div>
                <div class="space-y-md">
                    @forelse($recentTransactions as $tx)
                        <div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded-lg transition-colors group">
                            <div class="flex items-center gap-md">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-sm" style="background-color: {{ $tx->category->color ?? '#9CA3AF' }}">
                                    <span class="material-symbols-outlined text-[20px]">{{ $tx->category->icon ?? 'payments' }}</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-on-surface text-sm line-clamp-1">{{ $tx->description ?: $tx->category->name }}</h4>
                                    <p class="text-xs text-on-surface-variant">{{ $tx->transaction_date->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-bold text-sm {{ $tx->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $tx->type === 'income' ? '+' : '-' }} {{ number_format($tx->amount, 0, ',', '.') }}
                                </span>
                                <p class="text-[10px] text-on-surface-variant/60 uppercase tracking-tighter">{{ $tx->source }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-xl">
                            <div class="w-16 h-16 bg-surface-container rounded-full flex items-center justify-center mx-auto mb-md opacity-20">
                                <span class="material-symbols-outlined text-[32px]">receipt_long</span>
                            </div>
                            <p class="text-on-surface-variant text-sm">Belum ada transaksi.</p>
                            <a href="{{ route('transaksi') }}" class="text-primary text-xs mt-sm inline-block font-semibold">Catat transaksi pertama</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('cashflowChart').getContext('2d');
            
            const gradientIncome = ctx.createLinearGradient(0, 0, 0, 400);
            gradientIncome.addColorStop(0, 'rgba(var(--color-primary-rgb), 0.8)');
            gradientIncome.addColorStop(1, 'rgba(var(--color-primary-rgb), 0.1)');

            const gradientExpense = ctx.createLinearGradient(0, 0, 0, 400);
            gradientExpense.addColorStop(0, 'rgba(var(--color-secondary-rgb), 0.8)');
            gradientExpense.addColorStop(1, 'rgba(var(--color-secondary-rgb), 0.1)');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($cashflow['labels']) !!},
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: {!! json_encode($cashflow['income']) !!},
                            backgroundColor: '#1B6B23', // primary
                            borderRadius: 6,
                            barThickness: 12,
                        },
                        {
                            label: 'Pengeluaran',
                            data: {!! json_encode($cashflow['expense']) !!},
                            backgroundColor: '#52634F', // secondary
                            borderRadius: 6,
                            barThickness: 12,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.9)',
                            titleColor: '#1A1C19',
                            bodyColor: '#1A1C19',
                            borderColor: '#E1E3DE',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
                            ticks: {
                                callback: function(value) {
                                    if (value >= 1000000) return (value / 1000000) + 'jt';
                                    if (value >= 1000) return (value / 1000) + 'rb';
                                    return value;
                                },
                                font: { size: 11 }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 11 } }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>