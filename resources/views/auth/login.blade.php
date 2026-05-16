<x-auth-layout>
    {{-- Override slot to use full-page layout instead of guest navbar/footer --}}
    <div class="min-h-screen flex relative overflow-hidden bg-background">

        {{-- ─── Left: Brand Panel ─────────────────────────────────────────── --}}
        <div class="hidden lg:flex flex-col justify-between w-[42%] relative bg-gradient-to-br from-primary via-primary to-secondary overflow-hidden p-12">
            {{-- Animated blobs --}}
            <div class="absolute top-[-15%] left-[-15%] w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[400px] h-[400px] bg-secondary-container/30 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
            <div class="absolute top-[40%] left-[60%] w-[200px] h-[200px] bg-white/5 rounded-full blur-2xl animate-pulse" style="animation-delay: 3s;"></div>

            {{-- Logo & tagline --}}
            <div class="relative z-10">
                <a href="{{ route('landing_page') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-colors">
                        <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                    </div>
                    <span class="text-white font-black text-2xl tracking-tight">CashMate</span>
                </a>
            </div>

            {{-- Center feature list --}}
            <div class="relative z-10 space-y-8">
                <div>
                    <h2 class="text-white font-black text-4xl leading-tight mb-4">
                        Selamat Datang<br>Kembali! 👋
                    </h2>
                    <p class="text-white/70 font-body-md text-body-md leading-relaxed">
                        Kelola pembukuan UMKM Anda dengan kecerdasan AI yang sudah siap membantu kapan saja.
                    </p>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['document_scanner', 'Scan nota otomatis dengan AI'],
                        ['bar_chart', 'Dashboard laporan real-time'],
                        ['category', 'Kategori transaksi cerdas'],
                    ] as $feature)
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-white/15 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-base" style="font-variation-settings: 'FILL' 1;">{{ $feature[0] }}</span>
                            </div>
                            <span class="text-white/90 font-label-md text-label-md">{{ $feature[1] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom quote --}}
            <div class="relative z-10">
                <div class="glass-panel bg-white/10 border-white/20 rounded-2xl p-5">
                    <p class="text-white/90 font-body-md text-sm italic leading-relaxed">
                        "CashMate menghemat 3 jam sehari yang biasa saya habiskan untuk catat-mencatat."
                    </p>
                    <div class="flex items-center gap-3 mt-3">
                        <div class="w-8 h-8 rounded-full bg-white/30 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings: 'FILL' 1;">person</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm">Dewi R.</p>
                            <p class="text-white/60 text-xs">Pemilik Warung Makan, Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── Right: Form Panel ─────────────────────────────────────────── --}}
        <div class="flex-1 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-16 relative">
            {{-- Ambient blobs (mobile bg) --}}
            <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-primary-container/15 rounded-full blur-[80px] pointer-events-none lg:hidden"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-secondary-container/15 rounded-full blur-[80px] pointer-events-none lg:hidden"></div>

            {{-- Mobile logo --}}
            <div class="lg:hidden mb-8 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                <span class="font-black text-2xl text-primary tracking-tight">CashMate</span>
            </div>

            <div class="w-full max-w-md relative z-10">
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="font-black text-3xl text-on-surface mb-2 tracking-tight">Masuk ke Akun</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-primary font-semibold hover:underline underline-offset-2 transition-colors">Daftar gratis</a>
                    </p>
                </div>

                {{-- Session Status --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div class="space-y-1.5">
                        <label for="email" class="block font-label-md text-label-md text-on-surface-variant">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">alternate_email</span>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="w-full pl-10 pr-4 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('email') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label for="password" class="block font-label-md text-label-md text-on-surface-variant">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="font-label-md text-label-md text-primary hover:underline underline-offset-2 transition-colors text-sm">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">lock</span>
                            </div>
                            <input
                                id="password"
                                :type="show ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full pl-10 pr-12 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('password') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors">
                                <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'">visibility</span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center gap-2">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20 bg-surface-container-low cursor-pointer"
                        >
                        <label for="remember_me" class="font-body-md text-body-md text-on-surface-variant cursor-pointer select-none">
                            Ingat saya selama 30 hari
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button
                        id="login-submit"
                        type="submit"
                        class="w-full py-3 px-6 bg-gradient-to-r from-primary to-secondary text-on-primary font-semibold rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center justify-center gap-2 group"
                    >
                        <span class="material-symbols-outlined text-xl group-hover:translate-x-0.5 transition-transform" style="font-variation-settings: 'FILL' 1;">login</span>
                        Masuk Sekarang
                    </button>
                </form>

                {{-- Divider --}}
                <div class="flex items-center gap-4 my-6">
                    <div class="flex-1 h-px bg-outline-variant/40"></div>
                    <span class="font-label-md text-label-md text-on-surface-variant/50 text-sm">atau</span>
                    <div class="flex-1 h-px bg-outline-variant/40"></div>
                </div>

                {{-- Register CTA --}}
                <a
                    href="{{ route('register') }}"
                    class="w-full py-3 px-6 bg-surface-container-low border border-outline-variant/50 text-on-surface font-semibold rounded-xl hover:bg-surface-container hover:border-outline/70 transition-all flex items-center justify-center gap-2 group"
                >
                    <span class="material-symbols-outlined text-xl text-primary" style="font-variation-settings: 'FILL' 1;">person_add</span>
                    Buat Akun Baru — Gratis!
                </a>
            </div>
        </div>
    </div>
</x-auth-layout>
