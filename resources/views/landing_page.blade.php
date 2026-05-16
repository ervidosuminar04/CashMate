<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative pt-[140px] pb-xl px-gutter overflow-hidden flex flex-col items-center justify-center min-h-[921px]">
        <!-- Abstract Background Elements -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-secondary-fixed-dim/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-primary-fixed-dim/40 rounded-full blur-3xl -z-10"></div>
        <div class="max-w-4xl mx-auto text-center z-10">
            <h1 class="font-display-xl text-display-xl text-on-surface mb-md">
                Kelola Keuangan UMKM <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Tanpa Beban</span>
            </h1>
            <p class="font-headline-md text-headline-md text-on-surface-variant mb-xl max-w-2xl mx-auto">
                Catat nota otomatis dengan AI. Fokus jualan, biar CashMate yang urus pembukuan.
            </p>
            <div class="flex justify-center gap-md">
                <!-- CTA with simulated glow using shadow -->
                <a href="{{ route('register') }}" class="group relative px-xl py-md bg-gradient-to-r from-primary to-secondary rounded-lg text-on-primary text-[20px] font-semibold shadow-xl shadow-secondary-container/50 hover:shadow-secondary-container transition-all hover:-translate-y-1 overflow-hidden inline-flex">
                    <span class="relative z-10 flex items-center gap-sm">
                        <span class="material-symbols-outlined">auto_awesome</span>
                        Mulai Gratis
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>
        <!-- Hero UI Mockup Illustration -->
        <div class="mt-xl w-full max-w-5xl relative z-10">
            <div class="absolute -inset-1 bg-gradient-to-b from-white/60 to-transparent rounded-xl blur-sm"></div>
            <img alt="CashMate Dashboard Preview" class="relative rounded-xl border border-white/40 shadow-2xl shadow-green-900/10 object-cover h-[500px] w-full" data-alt="A bright, modern flat-lay composition showing a glowing smartphone displaying a clean, minimalist financial dashboard interface with glassmorphism elements. The phone rests on a pristine white desk surface surrounded by subtle, floating holographic geometric shapes and semi-transparent receipt icons in shades of indigo and violet. The lighting is soft and airy, creating an optimistic, high-tech, and empowering atmosphere typical of a modern AI financial tool." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxdGdjBtoJfyRk_8TOlGccGZiLamhBdcsUGO0YrZm9sBr9pV7mBddeYyKVISjRtrgwfhGlp3KZsSFEu2HexYVBS9_BNZk0-3ORLEWbSB3yYdKPAwJ1cqhyQR6XaD7y7XVwe_PtJa6-t-0RXx3qXjGPHIWzESKm6ua8bxBU1AFlaCiG3PH223nhXS3GWoXtYbNlm-vcqHsC8pJvqSATY1L79ZT57ZFHqhTtSoGSy4pFfb7-URp2PS_t66-6Iizi4kziJk6OAdCvamup"/>
        </div>
    </section>

    <!-- Features Section (Bento Grid) -->
    <section id="fitur" class="py-xl px-gutter bg-surface-container-low/30">
        <div class="max-w-[1280px] mx-auto">
            <div class="text-center mb-xl">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-sm">Fitur Andalan</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Kekuatan AI untuk kemudahan bisnis Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                <!-- Feature 1 -->
                <div class="bg-white/70 backdrop-blur-md border border-white/50 rounded-xl p-lg shadow-lg shadow-green-500/5 hover:-translate-y-1 hover:rotate-1 transition-transform duration-300 relative overflow-hidden group">
                    <div class="w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center mb-md text-on-primary-container group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">document_scanner</span>
                    </div>
                    <h3 class="text-[20px] font-semibold text-on-surface mb-xs">Smart OCR</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Foto nota, biar AI yang baca dan catat nominalnya secara otomatis.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white/70 backdrop-blur-md border border-white/50 rounded-xl p-lg shadow-lg shadow-green-500/5 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group border-l-4 border-l-tertiary-fixed-dim">
                    <div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center mb-md text-on-secondary-container group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <h3 class="text-[20px] font-semibold text-on-surface mb-xs">Kategori AI</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Pengeluaran dan pemasukan otomatis dikelompokkan dengan cerdas.</p>
                    <div class="absolute top-4 right-4 animate-pulse">
                        <span class="material-symbols-outlined text-tertiary-fixed-dim" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white/70 backdrop-blur-md border border-white/50 rounded-xl p-lg shadow-lg shadow-green-500/5 hover:-translate-y-1 hover:-rotate-1 transition-transform duration-300 relative overflow-hidden group">
                    <div class="w-12 h-12 bg-surface-tint/10 rounded-lg flex items-center justify-center mb-md text-primary group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">bar_chart</span>
                    </div>
                    <h3 class="text-[20px] font-semibold text-on-surface mb-xs">Dashboard Interaktif</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Pantau arus kas lewat grafik visual yang jernih dan mudah dipahami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="py-xl px-gutter">
        <div class="max-w-[1280px] mx-auto">
            <div class="text-center mb-xl">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-sm">Cara Kerja</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Hanya 3 langkah mudah untuk kebebasan finansial</p>
            </div>
            <div class="flex flex-col md:flex-row justify-center items-center gap-xl relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-1/2 left-[15%] right-[15%] h-[2px] bg-gradient-to-r from-transparent via-primary-fixed-dim to-transparent -translate-y-1/2 -z-10"></div>
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center max-w-[250px] relative bg-surface p-lg rounded-xl shadow-sm border border-white/50">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-md mb-sm border border-surface-variant">
                        <span class="material-symbols-outlined text-primary text-[32px]">add_a_photo</span>
                    </div>
                    <h4 class="text-[20px] font-semibold text-on-surface mb-xs">Upload Foto</h4>
                    <p class="text-[14px] leading-relaxed text-on-surface-variant">Foto nota fisik atau unggah tangkapan layar transaksi digital Anda.</p>
                </div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center max-w-[250px] relative bg-surface p-lg rounded-xl shadow-sm border border-white/50">
                    <div class="w-16 h-16 bg-secondary text-white rounded-full flex items-center justify-center shadow-lg shadow-secondary/30 mb-sm">
                        <span class="material-symbols-outlined text-[32px]">memory</span>
                    </div>
                    <h4 class="text-[20px] font-semibold text-on-surface mb-xs">AI Proses</h4>
                    <p class="text-[14px] leading-relaxed text-on-surface-variant">AI kami mengekstrak data dan mengkategorikan transaksi dalam hitungan detik.</p>
                </div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center max-w-[250px] relative bg-surface p-lg rounded-xl shadow-sm border border-white/50">
                    <div class="w-16 h-16 bg-primary-container rounded-full flex items-center justify-center shadow-md mb-sm border border-primary-fixed">
                        <span class="material-symbols-outlined text-on-primary-container text-[32px]">task_alt</span>
                    </div>
                    <h4 class="text-[20px] font-semibold text-on-surface mb-xs">Laporan Siap!</h4>
                    <p class="text-[14px] leading-relaxed text-on-surface-variant">Buku besar tercatat rapi, siap untuk dianalisis kapan saja.</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>