<x-app-layout>
    <x-slot name="title">Transaksi</x-slot>
    <!-- Header Section -->
    <div class="flex justify-between items-end">
        <div>
            <h2 class="font-title-lg text-title-lg text-on-surface mb-xs">Ringkasan Bulan Ini</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Pantau aliran dana usaha Anda dengan visualisasi interaktif.</p>
        </div>
        <div class="flex gap-sm">
            <button class="px-md py-sm rounded-lg border border-outline-variant text-on-surface font-label-md text-label-md flex items-center gap-xs hover:bg-surface-container-low transition-colors glass-panel">
                <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                Bulan Ini
            </button>
            <button class="px-md py-sm rounded-lg bg-primary text-on-primary font-label-md text-label-md flex items-center gap-xs shadow-lg shadow-primary/20 hover:bg-surface-tint transition-colors">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Catat Transaksi
            </button>
        </div>
    </div>
    <!-- Category Summary (4 Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
        <x-stat-card title="Bahan Baku" value="Rp 4.250.000" icon="inventory_2" color="primary" subtitle="45 Item" />
        <x-stat-card title="Operasional" value="Rp 1.800.000" icon="storefront" color="secondary" subtitle="12 Item" />
        <x-stat-card title="Gaji Karyawan" value="Rp 3.500.000" icon="payments" color="tertiary" subtitle="3 Staff" />
        <x-stat-card title="Lainnya" value="Rp 450.000" icon="category" color="neutral" subtitle="8 Item" />
    </div>
    <!-- Bubble View Visualization Area -->
    <div class="glass-panel rounded-xl p-lg flex flex-col h-[600px]">
        <div class="flex justify-between items-center mb-md">
            <h3 class="font-title-lg text-title-lg text-on-surface">Peta Proporsi Pengeluaran</h3>
            <!-- AI Insight Chip -->
            <div class="flex items-center gap-xs bg-surface-container-lowest border border-tertiary-fixed-dim rounded-full px-sm py-xs shadow-sm shadow-tertiary/10">
                <span class="material-symbols-outlined text-tertiary text-[16px] animate-pulse">auto_awesome</span>
                <span class="font-label-md text-label-md text-tertiary">Bahan baku mendominasi 42% pengeluaran minggu ini.</span>
            </div>
        </div>
        <!-- The Canvas for Bubbles -->
        <div class="flex-1 relative border border-outline-variant/20 rounded-lg bg-surface-container-lowest/30 overflow-hidden backdrop-blur-sm">
            <!-- Grid background pattern -->
            <div class="absolute inset-0 z-0 opacity-[0.03]" style="background-image: radial-gradient(#0b1c30 1px, transparent 1px); background-size: 20px 20px;"></div>
            <!-- Bubbles container (Absolute positioning to simulate chart) -->
            <!-- Bubble 1: Bahan Baku (Large) -->
            <div class="absolute top-[15%] left-[20%] w-[220px] h-[220px] rounded-full bg-primary/20 border-2 border-primary/40 glass-bubble flex flex-col items-center justify-center text-center p-md hover:scale-105 transition-transform duration-300 cursor-pointer z-20 group">
                <span class="material-symbols-outlined text-primary mb-xs text-[32px] group-hover:-translate-y-1 transition-transform">inventory_2</span>
                <span class="font-label-md text-label-md text-on-surface">Tepung Terigu</span>
                <span class="font-headline-md text-headline-md font-bold text-primary">Rp 1.2M</span>
            </div>
            <!-- Bubble 2: Bahan Baku (Medium) -->
            <div class="absolute top-[50%] left-[10%] w-[140px] h-[140px] rounded-full bg-primary/10 border border-primary/30 glass-bubble flex flex-col items-center justify-center text-center p-sm hover:scale-105 transition-transform duration-300 cursor-pointer z-10">
                <span class="font-label-md text-label-md text-on-surface mb-xs">Gula Pasir</span>
                <span class="font-title-lg text-title-lg font-bold text-primary">850rb</span>
            </div>
            <!-- Bubble 3: Operasional (Medium) -->
            <div class="absolute top-[25%] left-[55%] w-[180px] h-[180px] rounded-full bg-secondary/20 border-2 border-secondary/40 glass-bubble flex flex-col items-center justify-center text-center p-md hover:scale-105 transition-transform duration-300 cursor-pointer z-20 group">
                <span class="material-symbols-outlined text-secondary mb-xs text-[28px] group-hover:-translate-y-1 transition-transform">bolt</span>
                <span class="font-label-md text-label-md text-on-surface">Listrik &amp; Air</span>
                <span class="font-headline-md text-headline-md font-bold text-secondary">Rp 950rb</span>
            </div>
            <!-- Bubble 4: Gaji (Large) -->
            <div class="absolute bottom-[10%] left-[45%] w-[200px] h-[200px] rounded-full bg-tertiary/20 border-2 border-tertiary/40 glass-bubble flex flex-col items-center justify-center text-center p-md hover:scale-105 transition-transform duration-300 cursor-pointer z-20 group">
                <span class="material-symbols-outlined text-tertiary mb-xs text-[32px] group-hover:-translate-y-1 transition-transform">groups</span>
                <span class="font-label-md text-label-md text-on-surface">Gaji Staf Toko</span>
                <span class="font-headline-md text-headline-md font-bold text-tertiary">Rp 2.5M</span>
            </div>
            <!-- Bubble 5: Operasional (Small) -->
            <div class="absolute bottom-[20%] left-[75%] w-[120px] h-[120px] rounded-full bg-secondary/10 border border-secondary/30 glass-bubble flex flex-col items-center justify-center text-center p-sm hover:scale-105 transition-transform duration-300 cursor-pointer z-10">
                <span class="font-label-md text-label-md text-on-surface mb-xs text-[10px]">Internet</span>
                <span class="font-title-lg text-title-lg font-bold text-secondary">350rb</span>
            </div>
            <!-- Bubble 6: Lainnya (Small) -->
            <div class="absolute top-[10%] left-[80%] w-[100px] h-[100px] rounded-full bg-surface-variant/50 border border-outline-variant/50 glass-bubble flex flex-col items-center justify-center text-center p-xs hover:scale-105 transition-transform duration-300 cursor-pointer z-10">
                <span class="font-label-md text-label-md text-on-surface-variant mb-xs text-[10px]">Kemasan</span>
                <span class="font-body-md text-body-md font-bold text-on-surface">250rb</span>
            </div>
            <!-- Background floating elements to enhance depth -->
            <div class="absolute top-[40%] right-[30%] w-4 h-4 rounded-full bg-primary/30 blur-[2px]"></div>
            <div class="absolute bottom-[30%] left-[30%] w-6 h-6 rounded-full bg-secondary/20 blur-[3px]"></div>
            <div class="absolute top-[20%] left-[45%] w-3 h-3 rounded-full bg-tertiary/40 blur-[1px]"></div>
        </div>
    </div>
</x-app-layout>