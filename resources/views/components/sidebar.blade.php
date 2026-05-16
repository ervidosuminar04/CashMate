<nav class="bg-surface-container-low/80 backdrop-blur-2xl h-screen w-64 fixed left-0 top-0 border-r border-white/20 shadow-xl shadow-primary/5 flex flex-col p-md gap-sm z-50">
    <!-- Header / Logo -->
    <div class="flex items-center gap-sm px-sm py-md mb-md">
        <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-lg shadow-primary/30">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
        </div>
        <div class="flex flex-col">
            <span class="font-headline-md text-headline-md font-extrabold text-primary">CashMate</span>
            <span class="font-label-md text-label-md text-on-surface-variant">Co-pilot Keuangan</span>
        </div>
    </div>
    <!-- Navigation Links -->
    <div class="flex flex-col gap-xs flex-1">
        <!-- Dashboard -->
        <a class="flex items-center gap-md px-md py-sm rounded-lg {{ request()->routeIs('dashboard') ? 'bg-secondary-container text-on-secondary-container font-bold shadow-md shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/50 group' }}" href="{{ url('/dashboard') }}">
            <span class="material-symbols-outlined {{ request()->routeIs('dashboard') ? '' : 'group-hover:text-primary' }}" style="font-variation-settings: 'FILL' {{ request()->routeIs('dashboard') ? '1' : '0' }};">home</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>
        <!-- Unggah -->
        <a class="flex items-center gap-md px-md py-sm rounded-lg {{ request()->routeIs('upload.*') ? 'bg-secondary-container text-on-secondary-container font-bold shadow-md shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/50 group' }}" href="{{ url('/upload') }}">
            <span class="material-symbols-outlined {{ request()->routeIs('upload.*') ? '' : 'group-hover:text-primary' }}" style="font-variation-settings: 'FILL' {{ request()->routeIs('upload.*') ? '1' : '0' }};">cloud_upload</span>
            <span class="font-label-md text-label-md">Unggah</span>
        </a>
        <!-- Transaksi -->
        <a class="flex items-center gap-md px-md py-sm rounded-lg {{ request()->routeIs('transaksi.*') ? 'bg-secondary-container text-on-secondary-container font-bold shadow-md shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/50 group' }}" href="{{ url('/transaksi') }}">
            <span class="material-symbols-outlined {{ request()->routeIs('transaksi.*') ? '' : 'group-hover:text-primary' }}" style="font-variation-settings: 'FILL' {{ request()->routeIs('transaksi.*') ? '1' : '0' }};">receipt_long</span>
            <span class="font-label-md text-label-md">Transaksi</span>
        </a>
        <!-- Laporan -->
        <a class="flex items-center gap-md px-md py-sm rounded-lg {{ request()->routeIs('laporan.*') ? 'bg-secondary-container text-on-secondary-container font-bold shadow-md shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/50 group' }}" href="{{ url('/laporan') }}">
            <span class="material-symbols-outlined {{ request()->routeIs('laporan.*') ? '' : 'group-hover:text-primary' }}" style="font-variation-settings: 'FILL' {{ request()->routeIs('laporan.*') ? '1' : '0' }};">analytics</span>
            <span class="font-label-md text-label-md">Laporan</span>
        </a>
        <!-- Pengaturan -->
        <a class="flex items-center gap-md px-md py-sm rounded-lg {{ request()->routeIs('pengaturan.*') ? 'bg-secondary-container text-on-secondary-container font-bold shadow-md shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/50 group' }}" href="{{ url('/pengaturan') }}">
            <span class="material-symbols-outlined {{ request()->routeIs('pengaturan.*') ? '' : 'group-hover:text-primary' }}" style="font-variation-settings: 'FILL' {{ request()->routeIs('pengaturan.*') ? '1' : '0' }};">settings</span>
            <span class="font-label-md text-label-md">Pengaturan</span>
        </a>
    </div>
    <!-- CTA Bottom -->
    <div class="mt-auto pt-md border-t border-white/20">
        <!-- Log Out Form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               class="flex items-center gap-md px-md py-sm text-error hover:bg-error-container/50 rounded-lg group"
               onclick="event.preventDefault(); this.closest('form').submit();">
                <span class="material-symbols-outlined group-hover:scale-110 transition-transform">logout</span>
                <span class="font-label-md text-label-md">Keluar</span>
            </a>
        </form>
    </div>
</nav>
