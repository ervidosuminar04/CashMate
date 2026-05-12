<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>CashMate - Kelola Keuangan UMKM Tanpa Beban</title>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Config -->
<script id="tailwind-config">
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        "colors": {
                "tertiary-fixed": "#bdece2",
                "background": "#f8f9ff",
                "primary": "#006e2f",
                "secondary-fixed": "#dce1ff",
                "outline-variant": "#bccbb9",
                "surface-container-highest": "#d3e4fe",
                "on-tertiary-fixed": "#00201c",
                "inverse-surface": "#213145",
                "surface-dim": "#cbdbf5",
                "on-surface": "#0b1c30",
                "on-tertiary-container": "#1a4741",
                "primary-fixed-dim": "#4ae176",
                "primary-fixed": "#6bff8f",
                "on-surface-variant": "#3d4a3d",
                "surface-container-lowest": "#ffffff",
                "on-primary-container": "#004b1e",
                "inverse-on-surface": "#eaf1ff",
                "surface-bright": "#f8f9ff",
                "on-background": "#0b1c30",
                "on-secondary-fixed": "#00164e",
                "inverse-primary": "#4ae176",
                "on-tertiary-fixed-variant": "#224e47",
                "on-primary": "#ffffff",
                "primary-container": "#22c55e",
                "surface-variant": "#d3e4fe",
                "surface-container": "#e5eeff",
                "surface-container-low": "#eff4ff",
                "secondary": "#4059aa",
                "error": "#ba1a1a",
                "surface": "#f8f9ff",
                "on-primary-fixed-variant": "#005321",
                "on-secondary-fixed-variant": "#264191",
                "secondary-container": "#8fa7fe",
                "tertiary-fixed-dim": "#a2d0c6",
                "on-error": "#ffffff",
                "outline": "#6d7b6c",
                "surface-container-high": "#dce9ff",
                "on-primary-fixed": "#002109",
                "secondary-fixed-dim": "#b6c4ff",
                "on-error-container": "#93000a",
                "on-secondary": "#ffffff",
                "tertiary": "#3b665f",
                "tertiary-container": "#88b5ac",
                "on-secondary-container": "#1d3989",
                "error-container": "#ffdad6",
                "surface-tint": "#006e2f",
                "on-tertiary": "#ffffff"
        },
        "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
        },
        "spacing": {
                "lg": "24px",
                "gutter": "16px",
                "xl": "40px",
                "xs": "4px",
                "margin-desktop": "64px",
                "sm": "8px",
                "md": "16px",
                "margin-mobile": "20px"
        },
        "fontFamily": {
                "label-md": [
                        "Manrope"
                ],
                "headline-md": [
                        "Manrope"
                ],
                "headline-lg-mobile": [
                        "Manrope"
                ],
                "display-xl": [
                        "Manrope"
                ],
                "headline-lg": [
                        "Manrope"
                ],
                "body-lg": [
                        "Manrope"
                ],
                "body-md": [
                        "Manrope"
                ],
                "caption": [
                        "Manrope"
                ]
        },
        "fontSize": {
                "label-md": [
                        "14px",
                        {
                                "lineHeight": "20px",
                                "letterSpacing": "0.05em",
                                "fontWeight": "600"
                        }
                ],
                "headline-md": [
                        "24px",
                        {
                                "lineHeight": "32px",
                                "fontWeight": "600"
                        }
                ],
                "headline-lg-mobile": [
                        "24px",
                        {
                                "lineHeight": "32px",
                                "fontWeight": "700"
                        }
                ],
                "display-xl": [
                        "48px",
                        {
                                "lineHeight": "56px",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "800"
                        }
                ],
                "headline-lg": [
                        "32px",
                        {
                                "lineHeight": "40px",
                                "letterSpacing": "-0.01em",
                                "fontWeight": "700"
                        }
                ],
                "body-lg": [
                        "18px",
                        {
                                "lineHeight": "28px",
                                "fontWeight": "400"
                        }
                ],
                "body-md": [
                        "16px",
                        {
                                "lineHeight": "24px",
                                "fontWeight": "400"
                        }
                ],
                "caption": [
                        "12px",
                        {
                                "lineHeight": "16px",
                                "fontWeight": "500"
                        }
                ]
        }
},
    },
  }
</script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md text-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 flex justify-between items-center px-lg py-md max-w-[1280px] mx-auto bg-surface-container-lowest/70 backdrop-blur-xl border-b border-white/30 shadow-lg shadow-green-500/5 left-1/2 -translate-x-1/2">
<div class="flex items-center gap-md">
<span class="font-headline-lg text-headline-lg font-black text-primary tracking-tight">CashMate</span>
</div>
<nav class="hidden md:flex gap-lg">
<!-- Labels from JSON -->
<a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="#">Fitur</a>
<a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="#">Tentang Kami</a>
</nav>
<div class="flex items-center gap-md">
<!-- Trailing Actions from JSON -->
<button class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md hidden md:block">Masuk</button>
<button class="bg-primary text-on-primary px-lg py-sm rounded-lg hover:bg-surface-tint hover:scale-[0.98] transition-all font-label-md text-label-md shadow-md shadow-primary/20">Mulai Gratis</button>
</div>
</header>
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
<button class="group relative px-xl py-md bg-gradient-to-r from-primary to-secondary rounded-lg text-on-primary text-[20px] font-semibold shadow-xl shadow-secondary-container/50 hover:shadow-secondary-container transition-all hover:-translate-y-1 overflow-hidden">
<span class="relative z-10 flex items-center gap-sm">
<span class="material-symbols-outlined">auto_awesome</span>
                        Mulai Gratis
                    </span>
<div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
</button>
</div>
</div>
<!-- Hero UI Mockup Illustration -->
<div class="mt-xl w-full max-w-5xl relative z-10">
<div class="absolute -inset-1 bg-gradient-to-b from-white/60 to-transparent rounded-xl blur-sm"></div>
<img alt="CashMate Dashboard Preview" class="relative rounded-xl border border-white/40 shadow-2xl shadow-green-900/10 object-cover h-[500px] w-full" data-alt="A bright, modern flat-lay composition showing a glowing smartphone displaying a clean, minimalist financial dashboard interface with glassmorphism elements. The phone rests on a pristine white desk surface surrounded by subtle, floating holographic geometric shapes and semi-transparent receipt icons in shades of indigo and violet. The lighting is soft and airy, creating an optimistic, high-tech, and empowering atmosphere typical of a modern AI financial tool." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxdGdjBtoJfyRk_8TOlGccGZiLamhBdcsUGO0YrZm9sBr9pV7mBddeYyKVISjRtrgwfhGlp3KZsSFEu2HexYVBS9_BNZk0-3ORLEWbSB3yYdKPAwJ1cqhyQR6XaD7y7XVwe_PtJa6-t-0RXx3qXjGPHIWzESKm6ua8bxBU1AFlaCiG3PH223nhXS3GWoXtYbNlm-vcqHsC8pJvqSATY1L79ZT57ZFHqhTtSoGSy4pFfb7-URp2PS_t66-6Iizi4kziJk6OAdCvamup"/>
</div>
</section>
<!-- Features Section (Bento Grid) -->
<section class="py-xl px-gutter bg-surface-container-low/30">
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
<!-- Footer -->
<footer class="flex flex-col md:flex-row justify-between items-center px-lg w-full max-w-[1280px] mx-auto py-xl bg-surface-container-highest border-t border-outline-variant/30 mt-xl">
<div class="mb-md md:mb-0">
<span class="text-[20px] font-bold text-on-surface">CashMate</span>
</div>
<div class="text-center md:text-left mb-md md:mb-0 text-[14px] leading-relaxed text-on-surface-variant">
            © 2024 CashMate Indonesia. Solusi AI terpercaya untuk UMKM Maju.
        </div>
<nav class="flex gap-md">
<!-- Links from JSON -->
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Pusat Bantuan</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Kontak Kami</a>
</nav>
</footer>
</body></html>