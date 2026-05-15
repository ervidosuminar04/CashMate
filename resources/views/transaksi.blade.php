<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>CashMate - Transaksi</title>
<!-- Fonts & Icons -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Theme Configuration -->
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
                "margin-mobile": "20px",
                "container-max": "1280px"
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
                ],
                "title-lg": ["Manrope"],
                "number-lg": ["Manrope"],
                "body-sm": ["Manrope"]
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
                ],
                "title-lg": ["20px", { "lineHeight": "1.5", "fontWeight": "600" }],
                "number-lg": ["28px", { "lineHeight": "1.2", "fontWeight": "700" }],
                "body-sm": ["14px", { "lineHeight": "1.6", "fontWeight": "400" }]
        }
},
    },
  }
</script>
<style>
        /* Base Material Icons style */
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-top: 1px solid rgba(255, 255, 255, 0.8);
            border-left: 1px solid rgba(255, 255, 255, 0.8);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-bubble {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(0, 110, 47, 0.1);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen antialiased flex overflow-x-hidden relative">
<!-- Ambient Background Elements -->
<div class="fixed top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-primary-fixed/30 blur-[100px] pointer-events-none z-0"></div>
<div class="fixed bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-secondary-fixed/30 blur-[120px] pointer-events-none z-0"></div>
<!-- SideNavBar (Predicted JSON Component) -->
<nav class="bg-surface-container-low/80 backdrop-blur-2xl h-screen w-64 fixed left-0 top-0 border-r border-white/20 shadow-xl shadow-primary/5 flex flex-col p-md gap-sm z-50">
<!-- Header / Logo -->
<div class="flex items-center gap-sm px-sm py-md mb-md">
<div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-lg shadow-primary/30">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md font-extrabold text-primary">CashMate AI</span>
<span class="font-label-md text-label-md text-on-surface-variant">Co-pilot Keuangan</span>
</div>
</div>
<!-- Navigation Links -->
<div class="flex flex-col gap-xs flex-1">
<!-- Beranda -->
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-white/50 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">home</span>
<span class="font-label-md text-label-md">Beranda</span>
</a>
<!-- Unggah -->
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-white/50 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">cloud_upload</span>
<span class="font-label-md text-label-md">Unggah</span>
</a>
<!-- Transaksi (ACTIVE STATE) -->
<a class="flex items-center gap-md px-md py-sm bg-secondary-container text-on-secondary-container rounded-lg font-bold shadow-md shadow-secondary/20" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
<span class="font-label-md text-label-md">Transaksi</span>
</a>
<!-- Laporan -->
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-white/50 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">analytics</span>
<span class="font-label-md text-label-md">Laporan</span>
</a>
<!-- Pengaturan -->
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-white/50 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">settings</span>
<span class="font-label-md text-label-md">Pengaturan</span>
</a>
</div>
<!-- CTA Bottom -->
<div class="mt-auto pt-md">
<button class="w-full py-sm px-md bg-gradient-to-r from-secondary to-primary text-on-primary rounded-lg font-label-md text-label-md shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform flex items-center justify-center gap-xs">
<span class="material-symbols-outlined text-[18px]">favorite</span>
                Bantu UMKM
            </button>
</div>
</nav>
<!-- Main Content Area -->
<main class="ml-64 flex-1 flex flex-col min-h-screen relative z-10 w-[calc(100%-16rem)]">
<!-- TopAppBar (Predicted JSON Component) -->
<header class="bg-surface/50 backdrop-blur-md docked full-width top-0 sticky border-b border-white/10 flat no-shadows flex justify-between items-center w-full px-lg py-sm z-40">
<div class="flex items-center gap-md">
<button class="text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full transition-colors flex items-center justify-center">
<span class="material-symbols-outlined">menu</span>
</button>
<h1 class="font-headline-md text-headline-md font-bold text-on-surface">Transaksi</h1>
</div>
<div class="flex items-center gap-md">
<!-- Search Bar Placeholder (on_right) -->
<div class="hidden md:flex items-center bg-surface-container-lowest border border-outline-variant/30 rounded-full px-md py-sm focus-within:ring-2 ring-primary/20">
<span class="material-symbols-outlined text-on-surface-variant text-[20px] mr-sm">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-sm font-body-sm text-on-surface w-48 outline-none placeholder:text-outline" placeholder="Cari transaksi..." type="text"/>
</div>
<!-- Trailing Actions -->
<button class="text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full transition-colors relative flex items-center justify-center">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<button class="text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full transition-colors flex items-center justify-center">
<span class="material-symbols-outlined">help_outline</span>
</button>
<!-- Profile Avatar -->
<div class="w-10 h-10 rounded-full bg-surface-container-highest border-2 border-white shadow-sm overflow-hidden ml-sm cursor-pointer">
<img alt="Profil Pengusaha" class="w-full h-full object-cover" data-alt="A close-up portrait of a professional Indonesian female entrepreneur smiling warmly in a bright, modern office space. The lighting is soft and natural, emphasizing a clean, light-mode aesthetic with subtle cool-toned glass elements in the background. The mood is optimistic, confident, and approachable." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEFUOi5phET-wJgeBq95KC1VUnbP6IdWHkj2-Ww57WH45ZCB3AUhGj7iVY4QbKslVEBsa8PnyLRBp_7XFvRQ7NRImi8hisIkKFIuqF5q3TWcxBRH6Q3vZ3XYIvUrYAKckkArZyBCi8sI1bHrhwSME2VpAbVF86zSHnK6HDnE_l5-i1-FL9QTNKaA5qmaftsqG41CuhnVQtGtbBkqQe750Gzqu1TOurlLpJjMbsz2TKbe865mwK4px7n41e911LBGq1B3CN9H6aQZWz"/>
</div>
</div>
</header>
<!-- Page Canvas -->
<div class="p-lg max-w-container-max mx-auto w-full space-y-xl flex-1">
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
<!-- Bahan Baku (Primary / Blue mapped) -->
<div class="glass-panel rounded-xl p-md flex flex-col justify-between hover:-translate-y-1 transition-transform duration-300">
<div class="flex justify-between items-start mb-lg">
<div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center text-on-primary-container">
<span class="material-symbols-outlined">inventory_2</span>
</div>
<span class="px-sm py-xs bg-surface-container-highest rounded-full font-label-md text-label-md text-on-surface-variant text-[10px]">45 Item</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant mb-xs">Bahan Baku</p>
<p class="font-number-lg text-number-lg text-primary">Rp 4.250.000</p>
</div>
</div>
<!-- Operasional (Secondary / Purple mapped) -->
<div class="glass-panel rounded-xl p-md flex flex-col justify-between hover:-translate-y-1 transition-transform duration-300">
<div class="flex justify-between items-start mb-lg">
<div class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined">storefront</span>
</div>
<span class="px-sm py-xs bg-surface-container-highest rounded-full font-label-md text-label-md text-on-surface-variant text-[10px]">12 Item</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant mb-xs">Operasional</p>
<p class="font-number-lg text-number-lg text-secondary">Rp 1.800.000</p>
</div>
</div>
<!-- Gaji (Tertiary / Yellow mapped to fit theme, bypassing generic green) -->
<div class="glass-panel rounded-xl p-md flex flex-col justify-between hover:-translate-y-1 transition-transform duration-300">
<div class="flex justify-between items-start mb-lg">
<div class="w-10 h-10 rounded-lg bg-tertiary-container flex items-center justify-center text-on-tertiary-container">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="px-sm py-xs bg-surface-container-highest rounded-full font-label-md text-label-md text-on-surface-variant text-[10px]">3 Staff</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant mb-xs">Gaji Karyawan</p>
<p class="font-number-lg text-number-lg text-tertiary">Rp 3.500.000</p>
</div>
</div>
<!-- Lainnya (Surface Variant / Neutral) -->
<div class="glass-panel rounded-xl p-md flex flex-col justify-between hover:-translate-y-1 transition-transform duration-300">
<div class="flex justify-between items-start mb-lg">
<div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined">category</span>
</div>
<span class="px-sm py-xs bg-surface-container-highest rounded-full font-label-md text-label-md text-on-surface-variant text-[10px]">8 Item</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant mb-xs">Lainnya</p>
<p class="font-number-lg text-number-lg text-on-surface">Rp 450.000</p>
</div>
</div>
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
</div>
</main>
</body></html>