<x-app-layout>
    <x-slot name="title">Laporan Keuangan</x-slot>
    
    <!-- Selectors -->
    <section>
        <h2 class="font-headline-md text-headline-md text-on-surface mb-md">Pilih Jenis Laporan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            <!-- Active Selector -->
            <div class="glass-panel rounded-xl p-md cursor-pointer border-l-4 border-l-primary relative overflow-hidden group shadow-lg shadow-primary/10 transform transition-transform hover:-translate-y-1">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-xl group-hover:bg-primary/10 transition-colors"></div>
                <div class="flex items-start justify-between relative z-10">
                    <div>
                        <h3 class="font-label-md text-label-md text-primary font-bold mb-1">Arus Kas Bulanan</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Pantau uang masuk dan keluar secara rinci.</p>
                    </div>
                    <div class="p-sm bg-primary-container/20 rounded-full text-primary">
                        <span class="material-symbols-outlined" data-icon="water_drop">water_drop</span>
                    </div>
                </div>
            </div>
            <!-- Inactive Selectors -->
            <div class="glass-panel rounded-xl p-md cursor-pointer hover:border-l-4 hover:border-l-primary/50 relative overflow-hidden group transform transition-transform hover:-translate-y-1">
                <div class="flex items-start justify-between relative z-10">
                    <div>
                        <h3 class="font-label-md text-label-md text-on-surface font-semibold mb-1">Laba Rugi</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Ringkasan pendapatan dan beban usaha.</p>
                    </div>
                    <div class="p-sm bg-surface-container-high rounded-full text-on-surface-variant">
                        <span class="material-symbols-outlined" data-icon="trending_up">trending_up</span>
                    </div>
                </div>
            </div>
            <div class="glass-panel rounded-xl p-md cursor-pointer hover:border-l-4 hover:border-l-primary/50 relative overflow-hidden group transform transition-transform hover:-translate-y-1">
                <div class="flex items-start justify-between relative z-10">
                    <div>
                        <h3 class="font-label-md text-label-md text-on-surface font-semibold mb-1">Rekap Kategori</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Analisis pengeluaran berdasarkan kategori.</p>
                    </div>
                    <div class="p-sm bg-surface-container-high rounded-full text-on-surface-variant">
                        <span class="material-symbols-outlined" data-icon="pie_chart">pie_chart</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Report Preview Area -->
    <section class="glass-panel rounded-xl p-lg relative overflow-hidden">
        <!-- Decorative background blur -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-secondary/5 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-lg gap-md border-b border-outline-variant/30 pb-md">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">Laporan Arus Kas - Mei 2026</h2>
                <div class="flex items-center gap-2 mt-2">
                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px] mr-1" data-icon="calendar_month">calendar_month</span>
                        01 Mei - 31 Mei 2026
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap gap-sm">
                <button class="px-md py-sm rounded bg-white text-on-surface border border-outline-variant hover:bg-surface-container-lowest transition-colors shadow-sm flex items-center gap-2 font-label-md text-label-md">
                    <span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                    Download PDF
                </button>
                <button class="px-md py-sm rounded bg-white text-on-surface border border-outline-variant hover:bg-surface-container-lowest transition-colors shadow-sm flex items-center gap-2 font-label-md text-label-md">
                    <span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                    Download XLS
                </button>
            </div>
        </div>
        <!-- Summary Cards within Preview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md mb-xl">
            <div class="bg-surface-container-lowest/50 rounded-lg p-md border border-white/40 shadow-sm">
                <div class="font-label-md text-label-md text-on-surface-variant mb-1 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px] text-primary" data-icon="arrow_downward">arrow_downward</span>
                    Total Pemasukan
                </div>
                <div class="font-headline-md text-headline-md font-bold text-on-surface">Rp 45.000.000</div>
            </div>
            <div class="bg-surface-container-lowest/50 rounded-lg p-md border border-white/40 shadow-sm">
                <div class="font-label-md text-label-md text-on-surface-variant mb-1 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px] text-error" data-icon="arrow_upward">arrow_upward</span>
                    Total Pengeluaran
                </div>
                <div class="font-headline-md text-headline-md font-bold text-on-surface">Rp 28.500.000</div>
            </div>
            <div class="bg-primary/5 rounded-lg p-md border border-primary/20 shadow-sm relative overflow-hidden">
                <div class="absolute right-0 top-0 h-full w-1 bg-primary rounded-r"></div>
                <div class="font-label-md text-label-md text-primary font-bold mb-1 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]" data-icon="account_balance">account_balance</span>
                    Saldo Bersih
                </div>
                <div class="font-headline-md text-headline-md font-bold text-primary">Rp 16.500.000</div>
            </div>
        </div>
        <!-- Chart Preview Area -->
        <div class="bg-white/40 rounded-xl p-md border border-white/60 h-64 flex flex-col items-center justify-center relative overflow-hidden">
            <!-- Faux Chart Lines -->
            <div class="absolute inset-0 flex flex-col justify-between py-8 px-12 opacity-20 pointer-events-none">
                <div class="w-full h-px bg-outline-variant"></div>
                <div class="w-full h-px bg-outline-variant"></div>
                <div class="w-full h-px bg-outline-variant"></div>
                <div class="w-full h-px bg-outline-variant"></div>
            </div>
            <div class="relative z-10 text-center">
                <span class="material-symbols-outlined text-display-xl text-primary/30 mb-2" data-icon="bar_chart">bar_chart</span>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-sm mx-auto">
                    Grafik arus kas harian untuk periode Mei 2026. Data siap untuk diunduh dalam laporan lengkap.
                </p>
            </div>
            <!-- Decorative AI Insight Overlay -->
            <div class="absolute bottom-4 left-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md border-l-4 border-l-tertiary-fixed-dim rounded shadow-md p-sm flex items-start gap-3">
                <span class="material-symbols-outlined text-tertiary-fixed-dim animate-pulse" data-icon="auto_awesome">auto_awesome</span>
                <div>
                    <span class="font-label-md text-label-md text-on-surface block mb-1">Wawasan AI</span>
                    <span class="font-body-md text-body-md text-on-surface-variant">Arus kas bulan ini menunjukkan peningkatan margin 12% dibandingkan bulan lalu, didorong oleh efisiensi biaya operasional.</span>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>