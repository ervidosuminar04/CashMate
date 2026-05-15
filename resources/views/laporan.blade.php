<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Laporan Keuangan - CashMate</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        .glass-card {
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            border: 1.5px solid;
            border-image-source: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
            border-image-slice: 1;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .light-leak {
            border-top: 1px solid rgba(255, 255, 255, 0.8);
            border-left: 1px solid rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen">
<!-- SideNavBar -->
<nav class="bg-surface-container-low/80 backdrop-blur-2xl text-primary dark:text-primary-fixed-dim border-r border-white/20 dark:border-outline-variant/10 shadow-xl shadow-indigo-900/5 h-screen w-64 fixed left-0 top-0 flex flex-col p-md gap-sm z-40 md:flex">
<div class="mb-lg px-sm">
<div class="font-headline-md text-headline-md font-extrabold text-primary dark:text-primary-fixed-dim flex items-center gap-sm">
<span class="material-symbols-outlined text-primary" data-icon="account_balance_wallet" data-weight="fill" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                CashMate AI
            </div>
<div class="font-label-md text-label-md text-on-surface-variant mt-1 px-1">Co-pilot Keuangan</div>
</div>
<div class="flex-1 flex flex-col gap-sm">
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant dark:text-outline hover:bg-white/50 dark:hover:bg-white/5 rounded-lg hover:translate-x-1 transition-transform duration-300 active:scale-95 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="home">home</span>
<span class="font-label-md text-label-md">Beranda</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant dark:text-outline hover:bg-white/50 dark:hover:bg-white/5 rounded-lg hover:translate-x-1 transition-transform duration-300 active:scale-95 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
<span class="font-label-md text-label-md">Unggah</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant dark:text-outline hover:bg-white/50 dark:hover:bg-white/5 rounded-lg hover:translate-x-1 transition-transform duration-300 active:scale-95 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
<span class="font-label-md text-label-md">Transaksi</span>
</a>
<!-- Active State -->
<a class="flex items-center gap-md px-md py-sm bg-secondary-container text-on-secondary-container rounded-lg font-bold shadow-md shadow-secondary/20 hover:translate-x-1 transition-transform duration-300 active:scale-95 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="analytics" data-weight="fill" style="font-variation-settings: 'FILL' 1;">analytics</span>
<span class="font-label-md text-label-md">Laporan</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant dark:text-outline hover:bg-white/50 dark:hover:bg-white/5 rounded-lg hover:translate-x-1 transition-transform duration-300 active:scale-95 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-md text-label-md">Pengaturan</span>
</a>
</div>
<div class="mt-auto">
<button class="w-full py-sm px-md rounded bg-primary text-on-primary font-label-md text-label-md bg-gradient-to-r from-primary to-secondary shadow-lg shadow-indigo-500/20 hover:scale-[1.02] transition-transform flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="support_agent">support_agent</span>
                Bantu UMKM
            </button>
</div>
</nav>
<!-- Main Content Wrapper -->
<main class="md:ml-64 min-h-screen pb-xl">
<!-- TopAppBar -->
<header class="bg-surface/50 backdrop-blur-md text-primary dark:text-primary-fixed-dim border-b border-white/10 flex justify-between items-center w-full px-lg py-sm docked full-width top-0 sticky z-30">
<div class="flex items-center gap-md">
<button class="md:hidden text-on-surface hover:bg-surface-container-high transition-colors p-sm rounded-full">
<span class="material-symbols-outlined" data-icon="menu">menu</span>
</button>
<h1 class="font-headline-md text-headline-md font-bold text-on-surface">Laporan Keuangan</h1>
</div>
<div class="flex items-center gap-md">
<div class="hidden md:flex relative focus-within:ring-2 ring-primary/20 rounded-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline" data-icon="search">search</span>
<input class="bg-surface-container-lowest border-none rounded-full pl-10 pr-4 py-2 font-body-md text-body-md text-on-surface focus:ring-0 focus:bg-white transition-colors w-64 shadow-sm shadow-indigo-900/5 light-leak" placeholder="Cari laporan..." type="text"/>
</div>
<button class="text-on-surface-variant hover:bg-surface-container-high transition-colors p-sm rounded-full relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<button class="text-on-surface-variant hover:bg-surface-container-high transition-colors p-sm rounded-full hidden sm:block">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
<div class="w-10 h-10 rounded-full bg-surface-container-high overflow-hidden border border-white/50 cursor-pointer hover:shadow-md transition-shadow ml-sm shrink-0">
<img alt="Profil Pengusaha" class="w-full h-full object-cover" data-alt="A professional headshot of a confident Indonesian entrepreneur woman with a warm smile, wearing a modern business casual outfit. Soft, bright lighting in a modern office setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1l79ShSn10sJzFZNPAC-RQyVdSJY6LuLb-r2lgUIKE2-n4jy64KtCH6Bm0WxwD9xnNWF6WM67TbtbVewmgXAUH6qz0nqc1e7iBPTGk-SXoddAv0nSS3gPDaPz-FPlFwHykcowWqklWfHtpTH-gUdHeDZ4DDanPdyfi8qpY-RM9cKb79cNTVlBPTMtP9krYPvgtl1B8-zfZGM0y2q79gvoDwvu6fhyuPOGOLo6sKIwaeVo7Wh_IrNWRVNXjyOld7foXX8F7bz6FCbg"/>
</div>
</div>
</header>
<!-- Page Content -->
<div class="px-lg py-lg max-w-7xl mx-auto space-y-xl">
<!-- Selectors -->
<section>
<h2 class="font-headline-md text-headline-md text-on-surface mb-md">Pilih Jenis Laporan</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-md">
<!-- Active Selector -->
<div class="glass-card light-leak rounded-xl p-md cursor-pointer border-l-4 border-l-primary relative overflow-hidden group shadow-lg shadow-primary/10 transform transition-transform hover:-translate-y-1">
<div class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-xl group-hover:bg-primary/10 transition-colors"></div>
<div class="flex items-start justify-between relative z-10">
<div>
<h3 class="font-label-md text-label-md text-primary font-bold mb-1">Arus Kas Bulanan</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Pantau uang masuk dan keluar secara rinci.</p>
</div>
<div class="p-sm bg-primary-container/20 rounded-full text-primary">
<span class="material-symbols-outlined" data-icon="water_drop">water_drop</span>
</div>
</div>
</div>
<!-- Inactive Selectors -->
<div class="glass-card light-leak rounded-xl p-md cursor-pointer hover:border-l-4 hover:border-l-primary/50 relative overflow-hidden group transform transition-transform hover:-translate-y-1">
<div class="flex items-start justify-between relative z-10">
<div>
<h3 class="font-label-md text-label-md text-on-surface font-semibold mb-1">Laba Rugi</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Ringkasan pendapatan dan beban usaha.</p>
</div>
<div class="p-sm bg-surface-container-high rounded-full text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="trending_up">trending_up</span>
</div>
</div>
</div>
<div class="glass-card light-leak rounded-xl p-md cursor-pointer hover:border-l-4 hover:border-l-primary/50 relative overflow-hidden group transform transition-transform hover:-translate-y-1">
<div class="flex items-start justify-between relative z-10">
<div>
<h3 class="font-label-md text-label-md text-on-surface font-semibold mb-1">Rekap Kategori</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Analisis pengeluaran berdasarkan kategori.</p>
</div>
<div class="p-sm bg-surface-container-high rounded-full text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="pie_chart">pie_chart</span>
</div>
</div>
</div>
</div>
</section>
<!-- Report Preview Area -->
<section class="glass-card light-leak rounded-xl p-lg relative overflow-hidden">
<!-- Decorative background blur -->
<div class="absolute top-0 right-0 w-64 h-64 bg-secondary/5 rounded-full blur-3xl -z-10"></div>
<div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-lg gap-md border-b border-outline-variant/30 pb-md">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">Laporan Arus Kas - Mei 2026</h2>
<div class="flex items-center gap-2 mt-2">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[16px] mr-1" data-icon="calendar_month">calendar_month</span>
                                01 Mei - 31 Mei 2026
                            </span>
</div>
</div>
<div class="flex flex-wrap gap-sm">
<button class="px-md py-sm rounded bg-white text-on-surface border border-outline-variant hover:bg-surface-container-lowest transition-colors shadow-sm flex items-center gap-2 font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                            Download PDF
                        </button>
<button class="px-md py-sm rounded bg-white text-on-surface border border-outline-variant hover:bg-surface-container-lowest transition-colors shadow-sm flex items-center gap-2 font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                            Download XLS
                        </button>
</div>
</div>
<!-- Summary Cards within Preview -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-md mb-xl">
<div class="bg-surface-container-lowest/50 rounded-lg p-md border border-white/40 shadow-sm">
<div class="font-label-md text-label-md text-on-surface-variant mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary" data-icon="arrow_downward">arrow_downward</span>
                            Total Pemasukan
                        </div>
<div class="font-headline-md text-headline-md font-bold text-on-surface">Rp 45.000.000</div>
</div>
<div class="bg-surface-container-lowest/50 rounded-lg p-md border border-white/40 shadow-sm">
<div class="font-label-md text-label-md text-on-surface-variant mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-error" data-icon="arrow_upward">arrow_upward</span>
                            Total Pengeluaran
                        </div>
<div class="font-headline-md text-headline-md font-bold text-on-surface">Rp 28.500.000</div>
</div>
<div class="bg-primary/5 rounded-lg p-md border border-primary/20 shadow-sm relative overflow-hidden">
<div class="absolute right-0 top-0 h-full w-1 bg-primary rounded-r"></div>
<div class="font-label-md text-label-md text-primary font-bold mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]" data-icon="account_balance">account_balance</span>
                            Saldo Bersih
                        </div>
<div class="font-headline-md text-headline-md font-bold text-primary">Rp 16.500.000</div>
</div>
</div>
<!-- Chart Preview Area -->
<div class="bg-white/40 rounded-xl p-md border border-white/60 h-64 flex flex-col items-center justify-center relative overflow-hidden">
<!-- Faux Chart Lines -->
<div class="absolute inset-0 flex flex-col justify-between py-8 px-12 opacity-20 pointer-events-none">
<div class="w-full h-px bg-outline-variant"></div>
<div class="w-full h-px bg-outline-variant"></div>
<div class="w-full h-px bg-outline-variant"></div>
<div class="w-full h-px bg-outline-variant"></div>
</div>
<div class="relative z-10 text-center">
<span class="material-symbols-outlined text-display-xl text-primary/30 mb-2" data-icon="bar_chart">bar_chart</span>
<p class="font-body-md text-body-md text-on-surface-variant max-w-sm mx-auto">
                            Grafik arus kas harian untuk periode Mei 2026. Data siap untuk diunduh dalam laporan lengkap.
                        </p>
</div>
<!-- Decorative AI Insight Overlay -->
<div class="absolute bottom-4 left-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md border-l-4 border-l-tertiary-fixed-dim rounded shadow-md p-sm flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary-fixed-dim animate-pulse" data-icon="auto_awesome">auto_awesome</span>
<div>
<span class="font-label-md text-label-md text-on-surface block mb-1">Wawasan AI</span>
<span class="font-body-md text-body-md text-on-surface-variant">Arus kas bulan ini menunjukkan peningkatan margin 12% dibandingkan bulan lalu, didorong oleh efisiensi biaya operasional.</span>
</div>
</div>
</div>
</section>
</div>
</main>
</body></html>