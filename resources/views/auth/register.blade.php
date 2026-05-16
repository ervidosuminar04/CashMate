<x-auth-layout>
    <div class="min-h-screen flex relative overflow-hidden bg-background">

        {{-- ─── Left: Brand Panel ─────────────────────────────────────────── --}}
        <div class="hidden lg:flex flex-col justify-between w-[42%] relative bg-gradient-to-br from-secondary via-secondary to-primary overflow-hidden p-12">
            {{-- Animated blobs --}}
            <div class="absolute top-[-15%] right-[-15%] w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-[-20%] left-[-10%] w-[400px] h-[400px] bg-primary-container/30 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-[50%] left-[10%] w-[200px] h-[200px] bg-white/5 rounded-full blur-2xl animate-pulse" style="animation-delay: 4s;"></div>

            {{-- Logo --}}
            <div class="relative z-10">
                <a href="{{ route('landing_page') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-colors">
                        <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                    </div>
                    <span class="text-white font-black text-2xl tracking-tight">CashMate</span>
                </a>
            </div>

            {{-- Main content --}}
            <div class="relative z-10 space-y-8">
                <div>
                    <h2 class="text-white font-black text-4xl leading-tight mb-4">
                        Satu langkah<br>untuk mulai! ✨
                    </h2>
                    <p class="text-white/70 font-body-md text-body-md leading-relaxed">
                        Bergabung dengan ribuan pemilik UMKM yang sudah merasakan manfaat AI dalam pembukuan mereka.
                    </p>
                </div>

                {{-- Social proof --}}
                <div class="glass-panel bg-white/10 border-white/20 rounded-2xl p-5 space-y-4">
                    <div class="flex -space-x-2 mb-1">
                        @foreach(['#4CAF50', '#2196F3', '#FF9800', '#9C27B0'] as $color)
                            <div class="w-9 h-9 rounded-full ring-2 ring-white/30 flex items-center justify-center" style="background-color: {{ $color }};">
                                <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings: 'FILL' 1;">person</span>
                            </div>
                        @endforeach
                        <div class="w-9 h-9 rounded-full ring-2 ring-white/30 bg-white/20 flex items-center justify-center">
                            <span class="text-white font-bold text-xs">5k+</span>
                        </div>
                    </div>
                    <p class="text-white/90 font-body-md text-sm leading-relaxed">
                        <span class="font-bold">5.000+ UMKM</span> sudah menggunakan CashMate untuk mencatat lebih dari 100 ribu transaksi.
                    </p>
                    <div class="flex items-center gap-1">
                        @for ($i = 0; $i < 5; $i++)
                            <span class="material-symbols-outlined text-amber-300 text-base" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                        <span class="text-white/70 text-sm ml-1">4.9/5 dari 2.300+ ulasan</span>
                    </div>
                </div>

                {{-- Features checklist --}}
                <div class="space-y-3">
                    @foreach([
                        'Gratis selamanya untuk usaha kecil',
                        'Setup dalam 2 menit, tanpa kartu kredit',
                        'Data aman & terenkripsi',
                    ] as $perk)
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings: 'FILL' 1;">check</span>
                            </div>
                            <span class="text-white/90 font-label-md text-sm">{{ $perk }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom --}}
            <div class="relative z-10 text-white/50 font-label-md text-xs">
                © {{ date('Y') }} CashMate Indonesia
            </div>
        </div>

        {{-- ─── Right: Form Panel ─────────────────────────────────────────── --}}
        <div class="flex-1 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-16 relative">
            {{-- Ambient blobs (mobile) --}}
            <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-secondary-container/15 rounded-full blur-[80px] pointer-events-none lg:hidden"></div>
            <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-primary-container/15 rounded-full blur-[80px] pointer-events-none lg:hidden"></div>

            {{-- Mobile logo --}}
            <div class="lg:hidden mb-8 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                <span class="font-black text-2xl text-primary tracking-tight">CashMate</span>
            </div>

            <div class="w-full max-w-md relative z-10">
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="font-black text-3xl text-on-surface mb-2 tracking-tight">Buat Akun Baru</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline underline-offset-2 transition-colors">Masuk di sini</a>
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div class="space-y-1.5">
                        <label for="name" class="block font-label-md text-label-md text-on-surface-variant">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">badge</span>
                            </div>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Budi Santoso"
                                class="w-full pl-10 pr-4 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('name') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    {{-- Email --}}
                    <div class="space-y-1.5">
                        <label for="email" class="block font-label-md text-label-md text-on-surface-variant">Alamat Email</label>
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
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="w-full pl-10 pr-4 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('email') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <label for="password" class="block font-label-md text-label-md text-on-surface-variant">Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">lock</span>
                            </div>
                            <input
                                id="password"
                                :type="show ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Minimal 8 karakter"
                                class="w-full pl-10 pr-12 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('password') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors">
                                <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'">visibility</span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="space-y-1.5">
                        <label for="password_confirmation" class="block font-label-md text-label-md text-on-surface-variant">Konfirmasi Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">lock_reset</span>
                            </div>
                            <input
                                id="password_confirmation"
                                :type="show ? 'text' : 'password'"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                                class="w-full pl-10 pr-12 py-3 bg-surface-container-low/60 border rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 transition-all backdrop-blur-sm hover:border-outline/70 {{ $errors->has('password_confirmation') ? 'border-error/60 ring-2 ring-error/20' : 'border-outline-variant/50' }}"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors">
                                <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'">visibility</span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    {{-- TOS Agreement --}}
                    <p class="font-label-md text-label-md text-on-surface-variant/70 text-sm">
                        Dengan mendaftar, Anda menyetujui
                        <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a>
                        dan
                        <a href="#" class="text-primary hover:underline">Kebijakan Privasi</a> kami.
                    </p>

                    {{-- Submit --}}
                    <button
                        id="register-submit"
                        type="submit"
                        class="w-full py-3 px-6 bg-gradient-to-r from-primary to-secondary text-on-primary font-semibold rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center justify-center gap-2 group mt-2"
                    >
                        <span class="material-symbols-outlined text-xl group-hover:rotate-12 transition-transform" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
                        Mulai Gratis Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
