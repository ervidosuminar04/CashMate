<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CashMate') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-background font-body-md text-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container">
    <!-- TopNavBar -->
    <header class="fixed top-0 w-full z-50 flex justify-between items-center px-lg py-md max-w-[1280px] mx-auto bg-surface-container-lowest/70 backdrop-blur-xl border-b border-white/30 shadow-lg shadow-green-500/5 left-1/2 -translate-x-1/2">
        <div class="flex items-center gap-md">
            <a href="{{ url('/') }}" class="font-headline-lg text-headline-lg font-black text-primary tracking-tight">CashMate</a>
        </div>
        <nav class="hidden md:flex gap-lg">
            <a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="{{ url('/#fitur') }}">Fitur</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
        </nav>
        <div class="flex items-center gap-md">
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-primary text-on-primary px-lg py-sm rounded-lg hover:bg-surface-tint hover:scale-[0.98] transition-all font-label-md text-label-md shadow-md shadow-primary/20">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md hidden md:block">Masuk</a>
                <a href="{{ route('register') }}" class="bg-primary text-on-primary px-lg py-sm rounded-lg hover:bg-surface-tint hover:scale-[0.98] transition-all font-label-md text-label-md shadow-md shadow-primary/20">Mulai Gratis</a>
            @endauth
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="flex flex-col md:flex-row justify-between items-center px-lg w-full max-w-[1280px] mx-auto py-xl bg-surface-container-highest border-t border-outline-variant/30 mt-xl">
        <div class="mb-md md:mb-0">
            <span class="text-[20px] font-bold text-on-surface">CashMate</span>
        </div>
        <div class="text-center md:text-left mb-md md:mb-0 text-[14px] leading-relaxed text-on-surface-variant">
            &copy; {{ date('Y') }} CashMate Indonesia. Solusi AI terpercaya untuk UMKM Maju.
        </div>
        <nav class="flex gap-md">
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Pusat Bantuan</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Kontak Kami</a>
        </nav>
    </footer>
</body>
</html>
