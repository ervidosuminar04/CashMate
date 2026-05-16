<x-app-layout>
    <x-slot name="title">Laporan Keuangan</x-slot>
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-lg">
        <div>
            <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Laporan Keuangan</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Analisis komprehensif arus kas, laba rugi, dan pengeluaran.</p>
        </div>
        
        <div class="w-full md:w-auto">
            <form action="{{ route('laporan') }}" method="GET" class="flex flex-wrap items-center gap-sm">
                <div class="flex items-center gap-2 bg-surface-container rounded-lg p-1 border border-outline-variant">
                    <input type="date" name="start_date" value="{{ $startDate->format('Y-m-d') }}" class="bg-transparent border-none focus:ring-0 text-sm py-1 px-2" onchange="this.form.submit()">
                    <span class="text-on-surface-variant">-</span>
                    <input type="date" name="end_date" value="{{ $endDate->format('Y-m-d') }}" class="bg-transparent border-none focus:ring-0 text-sm py-1 px-2" onchange="this.form.submit()">
                </div>
                
                <a href="{{ route('laporan.pdf', request()->all()) }}" target="_blank" class="px-md py-2 rounded-lg bg-white text-on-surface border border-outline-variant hover:bg-surface-container-lowest transition-colors shadow-sm flex items-center gap-2 font-label-md text-label-md">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Cetak PDF
                </a>
            </form>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-md mb-lg">
        <x-stat-card title="Total Pemasukan" value="Rp {{ number_format($profitLossData['total_income'], 0, ',', '.') }}" icon="arrow_downward" color="primary" />
        <x-stat-card title="Total Pengeluaran" value="Rp {{ number_format($profitLossData['total_expense'], 0, ',', '.') }}" icon="arrow_upward" color="error" />
        <x-stat-card title="Laba Bersih" value="Rp {{ number_format($profitLossData['net_profit'], 0, ',', '.') }}" icon="account_balance" color="{{ $profitLossData['net_profit'] >= 0 ? 'primary' : 'error' }}" />
        <x-stat-card title="Margin Laba" value="{{ number_format($profitLossData['profit_margin'], 1) }}%" icon="percent" color="secondary" />
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-lg mb-lg">
        <!-- Cash Flow Line Chart -->
        <div class="xl:col-span-2">
            <x-glass-card class="p-lg h-full flex flex-col min-h-[400px]">
                <h3 class="font-title-lg text-title-lg text-on-surface mb-md">Arus Kas Harian</h3>
                <div class="flex-1 relative w-full">
                    <canvas id="cashFlowChart"></canvas>
                </div>
            </x-glass-card>
        </div>

        <!-- Category Doughnut Chart -->
        <div class="xl:col-span-1">
            <x-glass-card class="p-lg h-full flex flex-col min-h-[400px]">
                <h3 class="font-title-lg text-title-lg text-on-surface mb-md">Pengeluaran per Kategori</h3>
                @if(count($categoryBreakdown) > 0)
                    <div class="flex-1 relative w-full flex justify-center items-center">
                        <canvas id="categoryChart"></canvas>
                    </div>
                @else
                    <div class="flex-1 flex flex-col justify-center items-center text-on-surface-variant opacity-70">
                        <span class="material-symbols-outlined text-[48px] mb-sm">pie_chart</span>
                        <p>Belum ada data pengeluaran</p>
                    </div>
                @endif
            </x-glass-card>
        </div>
    </div>

    <!-- Category Table -->
    <x-glass-card class="p-lg mb-lg">
        <h3 class="font-title-lg text-title-lg text-on-surface mb-md">Rincian Pengeluaran</h3>
        
        @if(count($categoryBreakdown) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-body-md text-on-surface border-collapse">
                    <thead class="bg-surface-container border-b border-outline-variant">
                        <tr>
                            <th class="p-md font-bold">Kategori</th>
                            <th class="p-md font-bold text-right">Total Pengeluaran</th>
                            <th class="p-md font-bold text-right">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @foreach($categoryBreakdown as $category)
                            @php
                                $percentage = $profitLossData['total_expense'] > 0 
                                    ? ($category->total / $profitLossData['total_expense']) * 100 
                                    : 0;
                            @endphp
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="p-md">
                                    <div class="flex items-center gap-xs">
                                        <span class="w-3 h-3 rounded-full" style="background-color: {{ $category->color ?? '#ccc' }}"></span>
                                        {{ $category->name }}
                                    </div>
                                </td>
                                <td class="p-md text-right font-medium text-error">
                                    Rp {{ number_format($category->total, 0, ',', '.') }}
                                </td>
                                <td class="p-md text-right">
                                    <div class="flex items-center justify-end gap-sm">
                                        <span>{{ number_format($percentage, 1) }}%</span>
                                        <div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
                                            <div class="h-full rounded-full" style="width: {{ $percentage }}%; background-color: {{ $category->color ?? '#ccc' }}"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-xl text-on-surface-variant border border-dashed border-outline-variant rounded-xl">
                Tidak ada data pengeluaran pada periode ini.
            </div>
        @endif
    </x-glass-card>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cash Flow Chart
            const cashFlowCtx = document.getElementById('cashFlowChart').getContext('2d');
            const cashFlowLabels = @json(array_map(function($date) {
                return \Carbon\Carbon::parse($date)->format('d M');
            }, $cashFlowData['labels']));
            
            new Chart(cashFlowCtx, {
                type: 'line',
                data: {
                    labels: cashFlowLabels,
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: @json($cashFlowData['income']),
                            borderColor: '#22c55e',
                            backgroundColor: 'rgba(34, 197, 94, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Pengeluaran',
                            data: @json($cashFlowData['expense']),
                            borderColor: '#ef4444',
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
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

            // Category Doughnut Chart
            @if(count($categoryBreakdown) > 0)
                const categoryCtx = document.getElementById('categoryChart').getContext('2d');
                const categoryData = @json($categoryBreakdown);
                
                const labels = categoryData.map(item => item.name);
                const data = categoryData.map(item => item.total);
                const colors = categoryData.map(item => item.color || '#cccccc');
                
                new Chart(categoryCtx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: colors,
                            borderWidth: 1,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 12,
                                    padding: 15
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((value / total) * 100);
                                        const formattedValue = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value);
                                        
                                        return `${formattedValue} (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        cutout: '70%'
                    }
                });
            @endif
        });
    </script>
    @endpush
</x-app-layout>