<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CashMate Antigravity | Solusi Keuangan UMKM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-100 selection:bg-neon-cyan/30 bg-gravity-dark overflow-x-hidden">
        {{-- Background Elements --}}
        <div class="fixed inset-0 -z-10">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-neon-cyan/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-neon-rose/10 rounded-full blur-[120px]"></div>
        </div>

        <div class="relative min-h-screen flex flex-col items-center justify-center px-6 py-12">
            {{-- Navigation --}}
            <nav class="absolute top-0 w-full max-w-7xl px-6 py-8 flex justify-between items-center">
                <div class="flex items-center gap-2 group cursor-pointer">
                    <div class="w-10 h-10 bg-neon-cyan/20 border border-neon-cyan/50 rounded-lg flex items-center justify-center group-hover:neon-border-cyan transition-all">
                        <x-application-logo class="w-6 h-6 fill-current text-neon-cyan neon-glow-cyan" />
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white">CashMate <span class="text-neon-cyan">Antigravity</span></span>
                </div>

                @if (Route::has('login'))
                    <div class="flex gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2 glass-panel hover:neon-border-cyan transition-all font-medium text-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-2 text-slate-400 hover:text-white transition-all font-medium text-sm">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2 bg-neon-cyan text-gravity-dark rounded-lg font-bold text-sm shadow-[0_0_15px_rgba(0,242,255,0.4)] hover:bg-white transition-all">Daftar Sekarang</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>

            {{-- Hero Section --}}
            <main class="w-full max-w-6xl grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 animate-float">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-neon-cyan uppercase tracking-widest">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-neon-cyan opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-neon-cyan"></span>
                        </span>
                        Edisi Antigravity 2026
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-bold leading-[1.1] tracking-tight text-white">
                        Kelola Keuangan <br> 
                        <span class="bg-gradient-to-r from-neon-cyan to-neon-rose bg-clip-text text-transparent">Tanpa Beban.</span>
                    </h1>
                    
                    <p class="text-lg text-slate-400 max-w-lg leading-relaxed">
                        Aplikasi pembukuan masa depan untuk UMKM Surabaya. Proses nota otomatis dengan AI, visualisasi data real-time, dan performa super ringan.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-neon-cyan text-gravity-dark rounded-xl font-bold text-lg shadow-[0_0_20px_rgba(0,242,255,0.3)] hover:scale-105 transition-all">
                            Mulai Gratis
                        </a>
                        <button class="px-8 py-4 glass-panel hover:bg-white/10 transition-all font-semibold flex items-center gap-2">
                            <svg class="w-5 h-5 text-neon-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Lihat Demo
                        </button>
                    </div>
                </div>

                <div class="relative">
                    {{-- Visual Mockup --}}
                    <x-glass-card class="relative z-10 w-full aspect-square flex flex-col gap-6 overflow-hidden">
                        <div class="flex items-center justify-between border-b border-white/5 pb-4">
                            <div class="flex gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-neon-rose/50"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-neon-amber/50"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-neon-cyan/50"></div>
                            </div>
                            <span class="text-[10px] font-mono text-slate-500">CASHMATE_DASHBOARD_V4.SYS</span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="h-24 rounded-lg bg-white/5 border border-white/5 p-4 flex flex-col justify-between">
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider">Pendapatan</span>
                                <span class="text-xl font-bold text-white">Rp 12.5M</span>
                            </div>
                            <div class="h-24 rounded-lg bg-white/5 border border-white/5 p-4 flex flex-col justify-between">
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider">Pengeluaran</span>
                                <span class="text-xl font-bold text-neon-rose">Rp 4.2M</span>
                            </div>
                        </div>

                        <div class="flex-1 rounded-lg bg-white/5 border border-white/5 p-4 relative overflow-hidden">
                            <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-neon-cyan/20 to-transparent"></div>
                            {{-- Simple Chart Mockup --}}
                            <div class="flex items-end gap-2 h-full justify-around pb-2">
                                <div class="w-full bg-neon-cyan/40 rounded-t-sm" style="height: 40%"></div>
                                <div class="w-full bg-neon-cyan/40 rounded-t-sm" style="height: 60%"></div>
                                <div class="w-full bg-neon-cyan/60 rounded-t-sm" style="height: 30%"></div>
                                <div class="w-full bg-neon-cyan/40 rounded-t-sm" style="height: 85%"></div>
                                <div class="w-full bg-neon-cyan/80 rounded-t-sm shadow-[0_0_10px_rgba(0,242,255,0.3)]" style="height: 50%"></div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 p-3 bg-neon-cyan/10 border border-neon-cyan/20 rounded-xl">
                            <div class="w-8 h-8 rounded-full bg-neon-cyan flex items-center justify-center">
                                <svg class="w-4 h-4 text-gravity-dark" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-bold text-white">AI OCR Terdeteksi</p>
                                <p class="text-[10px] text-slate-400">Nota Warung Bu Ika - Rp 45.000</p>
                            </div>
                            <span class="text-[10px] font-bold text-neon-cyan">89% Akurasi</span>
                        </div>
                    </x-glass-card>

                    {{-- Floating Decorations --}}
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-neon-rose/20 rounded-full blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-neon-cyan/20 rounded-full blur-3xl animate-pulse"></div>
                </div>
            </main>
            
            <footer class="mt-24 text-slate-500 text-sm flex gap-8">
                <span>&copy; 2026 CashMate Surabaya</span>
                <a href="#" class="hover:text-neon-cyan transition-all">Kebijakan Privasi</a>
                <a href="#" class="hover:text-neon-cyan transition-all">Syarat & Ketentuan</a>
            </footer>
        </div>
    </body>
</html>
