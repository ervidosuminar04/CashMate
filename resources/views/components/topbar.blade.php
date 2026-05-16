<header class="bg-surface/50 backdrop-blur-md docked full-width top-0 sticky border-b border-white/10 flat no-shadows flex justify-between items-center w-full px-lg py-sm z-40">
    <div class="flex items-center gap-md">
        <button class="text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full transition-colors flex items-center justify-center">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <h1 class="font-headline-md text-headline-md font-bold text-on-surface">{{ $title ?? 'Dashboard' }}</h1>
    </div>
    <div class="flex items-center gap-md">
        <!-- Search Bar -->
        <div class="hidden md:flex items-center bg-surface-container-lowest border border-outline-variant/30 rounded-full px-md py-sm focus-within:ring-2 ring-primary/20">
            <span class="material-symbols-outlined text-on-surface-variant text-[20px] mr-sm">search</span>
            <input class="bg-transparent border-none focus:ring-0 text-body-sm font-body-sm text-on-surface w-48 outline-none placeholder:text-outline" placeholder="Cari transaksi..." type="text"/>
        </div>
        <!-- Trailing Actions -->
        <button class="text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full transition-colors relative flex items-center justify-center">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
        </button>
        <!-- Profile Avatar -->
        <div class="flex items-center gap-2 ml-sm cursor-pointer">
            <div class="text-right hidden md:flex flex-col">
                <span class="font-label-md text-label-md text-on-surface">{{ Auth::user()->name ?? 'User' }}</span>
                <span class="font-caption text-caption text-on-surface-variant text-[10px]">{{ Auth::user()->email ?? '' }}</span>
            </div>
            <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-lg shadow-sm">
                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
        </div>
    </div>
</header>
