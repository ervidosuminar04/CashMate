<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Tentang Kami - CashMate</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error": "#ffffff",
                        "inverse-primary": "#4ae176",
                        "secondary-fixed-dim": "#b6c4ff",
                        "on-primary-fixed-variant": "#005321",
                        "surface-container-low": "#eff4ff",
                        "surface": "#f8f9ff",
                        "on-secondary-container": "#1d3989",
                        "on-primary-fixed": "#002109",
                        "error-container": "#ffdad6",
                        "surface-tint": "#006e2f",
                        "on-secondary-fixed-variant": "#264191",
                        "outline-variant": "#bccbb9",
                        "on-surface": "#0b1c30",
                        "tertiary": "#3b665f",
                        "on-secondary": "#ffffff",
                        "on-tertiary-fixed-variant": "#224e47",
                        "secondary": "#4059aa",
                        "on-secondary-fixed": "#00164e",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#f8f9ff",
                        "surface-container": "#e5eeff",
                        "on-tertiary-container": "#1a4741",
                        "on-tertiary": "#ffffff",
                        "on-error-container": "#93000a",
                        "secondary-container": "#8fa7fe",
                        "inverse-surface": "#213145",
                        "surface-variant": "#d3e4fe",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#dce1ff",
                        "surface-dim": "#cbdbf5",
                        "on-background": "#0b1c30",
                        "tertiary-container": "#88b5ac",
                        "primary-container": "#22c55e",
                        "on-tertiary-fixed": "#00201c",
                        "primary": "#006e2f",
                        "surface-container-highest": "#d3e4fe",
                        "tertiary-fixed": "#bdece2",
                        "surface-container-high": "#dce9ff",
                        "outline": "#6d7b6c",
                        "inverse-on-surface": "#eaf1ff",
                        "primary-fixed-dim": "#4ae176",
                        "on-surface-variant": "#3d4a3d",
                        "background": "#f8f9ff",
                        "on-primary-container": "#004b1e",
                        "tertiary-fixed-dim": "#a2d0c6",
                        "error": "#ba1a1a",
                        "primary-fixed": "#6bff8f"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "40px",
                        "md": "16px",
                        "margin-mobile": "20px",
                        "margin-desktop": "64px",
                        "lg": "24px",
                        "gutter": "16px",
                        "xs": "4px",
                        "sm": "8px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "display-xl": ["Manrope"],
                        "label-md": ["Manrope"],
                        "caption": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "body-lg": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "body-md": ["Manrope"],
                        "title-lg": ["Manrope"]
                    },
                    "fontSize": {
                        "display-xl": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "caption": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "title-lg": ["20px", { "lineHeight": "1.5", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
<style>
        .aurora-gradient {
            background: linear-gradient(135deg, #004b1e 0%, #22c55e 100%);
        }
        .aurora-text {
            background: linear-gradient(135deg, #004b1e 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px rgba(30, 58, 138, 0.08);
        }
        .navy-bg {
            background-color: #0b1c30;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md antialiased min-h-screen flex flex-col pt-24">
<!-- TopAppBar Component (from SCREEN_7) -->
<header class="fixed top-0 w-full z-50 flex justify-between items-center px-lg py-md max-w-container-max mx-auto bg-surface-container-lowest/70 backdrop-blur-xl border-b border-white/30 shadow-lg shadow-indigo-500/5 left-1/2 -translate-x-1/2">
<div class="flex items-center gap-md">
<span class="font-headline-lg text-headline-lg font-black text-primary tracking-tight">CashMate</span>
</div>
<nav class="hidden md:flex gap-lg">
<a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="#">Fitur</a>
<a class="text-on-surface-variant hover:text-primary transition-colors font-headline-md text-headline-md" href="#">Tentang Kami</a>
</nav>
<div class="flex items-center gap-md">
<button class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md hidden md:block">Masuk</button>
<button class="bg-primary text-on-primary px-lg py-sm rounded-lg hover:bg-surface-tint hover:scale-[0.98] transition-all font-label-md text-label-md shadow-md shadow-primary/20">Mulai Gratis</button>
</div>
<button class="md:hidden text-on-surface p-2">
<span class="material-symbols-outlined text-3xl" data-icon="menu">menu</span>
</button>
</header>
<main class="flex-grow">
<!-- Hero Section -->
<section class="relative px-margin-mobile md:px-margin-desktop py-20 md:py-32 max-w-[1240px] mx-auto overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-primary-container/20 rounded-full blur-[100px]"></div>
<div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] bg-secondary-container/20 rounded-full blur-[100px]"></div>
</div>
<div class="relative z-10 text-center max-w-4xl mx-auto flex flex-col items-center gap-6">
<div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface-container-high border border-outline-variant/30 mb-4">
<span class="material-symbols-outlined text-primary text-sm" data-icon="rocket_launch">rocket_launch</span>
<span class="font-label-md text-on-surface-variant">Misi Kami</span>
</div>
<h1 class="font-display-xl text-display-xl text-on-surface mb-6">Memberdayakan <span class="aurora-text">UMKM Indonesia</span> Melalui Kecerdasan Buatan</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-2xl mx-auto">
                    CashMate hadir untuk menjembatani kesenjangan teknologi bagi usaha mikro, kecil, dan menengah. Kami percaya bahwa setiap bisnis, sekecil apapun, berhak atas alat keuangan yang cerdas dan mudah digunakan.
                </p>
</div>
</section>
<!-- Impact Metrics -->
<section class="px-margin-mobile md:px-margin-desktop py-12 max-w-[1240px] mx-auto relative z-20 -mt-20">
<div class="glass-card rounded-2xl p-8 md:p-12 grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-outline-variant/20">
<div class="flex flex-col items-center text-center px-4">
<span class="font-display-xl text-headline-lg text-primary mb-2">5000+</span>
<span class="font-label-md text-on-surface-variant">UMKM Terbantu</span>
</div>
<div class="flex flex-col items-center text-center px-4">
<span class="font-display-xl text-headline-lg text-primary mb-2">100rb+</span>
<span class="font-label-md text-on-surface-variant">Nota Terproses</span>
</div>
<div class="flex flex-col items-center text-center px-4">
<span class="font-display-xl text-headline-lg text-primary mb-2">34</span>
<span class="font-label-md text-on-surface-variant">Provinsi Aktif</span>
</div>
<div class="flex flex-col items-center text-center px-4">
<span class="font-display-xl text-headline-lg text-primary mb-2">98%</span>
<span class="font-label-md text-on-surface-variant">Akurasi AI</span>
</div>
</div>
</section>
<!-- Our Story Section -->
<section class="px-margin-mobile md:px-margin-desktop py-20 max-w-[1240px] mx-auto">
<div class="grid md:grid-cols-2 gap-12 items-center">
<div>
<h2 class="font-display-xl text-headline-lg text-on-surface mb-6">Cerita Perjalanan Kami</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                        Di Indonesia, UMKM merupakan tulang punggung ekonomi, menyumbang lebih dari 60% PDB nasional. Namun, banyak dari mereka yang masih terjebak dalam pembukuan manual yang memakan waktu dan rentan terhadap kesalahan. Hal ini seringkali menghambat potensi pertumbuhan dan akses mereka ke layanan keuangan.
                    </p>
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                        Melihat tantangan ini, kami mendirikan CashMate. Visi kami adalah mengotomatiskan tugas-tugas administratif yang membosankan sehingga para pemilik usaha dapat fokus pada apa yang benar-benar penting: mengembangkan bisnis mereka.
                    </p>
<p class="font-body-md text-body-md text-on-surface-variant">
                        Dengan memanfaatkan teknologi AI dan OCR terkini, CashMate mengubah setiap nota dan kuitansi menjadi data keuangan yang terstruktur dalam hitungan detik. Kami tidak hanya menyediakan aplikasi, tetapi juga memberdayakan para pahlawan ekonomi kita untuk mengambil keputusan berdasarkan data yang akurat dan tepat waktu.
                    </p>
</div>
<div class="relative">
<div class="absolute inset-0 bg-primary-container/20 rounded-3xl transform rotate-3 scale-105 -z-10"></div>
<img alt="Team working together" class="rounded-3xl shadow-xl w-full h-auto object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfeSNIDECkYm0XX_6ZF5zhOSQ45ioidqVI0bTh7yVjOFlk1ax3SphdBFy7nV_gGH2roI96MLtUfXSsmHHpzmjmWW_dmp2tHLsOSn2pGp04-PVbPQfAoIGFEACAcnz8eidXNfZa8IGj66CUNr3XMJ_lFqi1b1c08m2p8gJE4pVKvFTT5jxiTJavEdtLg7SxkStHrxFNtVQxwzk5-B3S5s-lpFjQ1EoYzkAIlHG2ZjvEgYxk6W1U14Tu0MYVAAaZ69PaZMAydZwgjWIs"/>
</div>
</div>
</section>
<!-- Core Values Section -->
<section class="navy-bg text-white py-20 px-margin-mobile md:px-margin-desktop">
<div class="max-w-[1240px] mx-auto">
<div class="text-center mb-16">
<h2 class="font-display-xl text-headline-lg mb-4 text-white">Nilai Inti Perusahaan</h2>
<p class="font-body-md text-body-md text-surface-variant/80 max-w-2xl mx-auto">Prinsip-prinsip yang memandu kami dalam setiap keputusan dan inovasi untuk melayani UMKM Indonesia dengan lebih baik.</p>
</div>
<div class="grid md:grid-cols-3 gap-8">
<div class="glass-card bg-white/10 border-white/20 p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300">
<div class="w-14 h-14 bg-primary-container/20 text-primary-fixed rounded-xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">visibility</span>
</div>
<h3 class="font-headline-md text-headline-md mb-3 text-white">Transparansi</h3>
<p class="font-body-md text-body-md text-surface-variant/80">Kami percaya pada komunikasi yang terbuka dan jujur, baik di dalam tim maupun dengan pengguna kami. Kepercayaan dibangun dari kejujuran dalam setiap tindakan.</p>
</div>
<div class="glass-card bg-white/10 border-white/20 p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300">
<div class="w-14 h-14 bg-primary-container/20 text-primary-fixed rounded-xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">lightbulb</span>
</div>
<h3 class="font-headline-md text-headline-md mb-3 text-white">Inovasi</h3>
<p class="font-body-md text-body-md text-surface-variant/80">Kami terus mendorong batas-batas teknologi AI untuk menciptakan solusi yang relevan, efisien, dan berdampak nyata bagi operasional harian UMKM.</p>
</div>
<div class="glass-card bg-white/10 border-white/20 p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300">
<div class="w-14 h-14 bg-primary-container/20 text-primary-fixed rounded-xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-3xl">volunteer_activism</span>
</div>
<h3 class="font-headline-md text-headline-md mb-3 text-white">Pemberdayaan</h3>
<p class="font-body-md text-body-md text-surface-variant/80">Tujuan utama kami adalah memberdayakan pemilik usaha kecil dengan alat yang setara dengan yang dimiliki perusahaan besar, untuk mencapai kemandirian finansial.</p>
</div>
</div>
</div>
</section>
<!-- Team Section -->
<section class="px-margin-mobile md:px-margin-desktop py-20 max-w-[1240px] mx-auto">
<div class="text-center mb-16">
<h2 class="font-display-xl text-headline-lg text-on-surface mb-4">Bertemu Tim Kepemimpinan Kami</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">Dipimpin oleh para ahli yang berdedikasi untuk mentransformasi lanskap keuangan digital bagi UMKM.</p>
</div>
<div class="grid md:grid-cols-4 gap-8">
<!-- Team Member 1 -->
<div class="flex flex-col items-center text-center group">
<div class="relative w-48 h-48 mb-6 overflow-hidden rounded-full ring-4 ring-surface-variant group-hover:ring-primary-container transition-all">
<img alt="CEO" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCSAp64THdiShWnDwFRz2pyAj8qsKfDy-lEG28wlY31Z44ge1GNkiV2SqSaA8B25cQmua2oSYLz5XMsvpjv7RdcffPtwWugL0drlkeMBMrPPAFz0qd__siRUWd85ziSSoCuMmSzVdivslEiq997vj1FWbxTUlwvJFUkdSOfhZCkb47YsrBgcVexu_1w5UzJk--W06RDSojIxenZviPB6XXA5zSq99KutRJSUL42DT4r9VDbLXNc3Thfy1cUvNMvbEtIZukwTy-Rg2c"/>
</div>
<h3 class="font-headline-md text-title-lg text-on-surface mb-1">Budi Santoso</h3>
<p class="font-label-md text-primary mb-3">CEO &amp; Co-Founder</p>
<p class="font-body-md text-sm text-on-surface-variant mb-4">Eks-bankir dengan 15 tahun pengalaman di sektor keuangan mikro.</p>
<div class="flex gap-3 text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">mail</span></a>
</div>
</div>
<!-- Team Member 2 -->
<div class="flex flex-col items-center text-center group">
<div class="relative w-48 h-48 mb-6 overflow-hidden rounded-full ring-4 ring-surface-variant group-hover:ring-primary-container transition-all">
<img alt="CTO" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0xXxTT_9_QCdec3QNo8cu4zigMmdWGHu_iCb_dl6sNQJ5tuE40m-t_e7e-2FfyoSIMYTu4fHdz8N0iVrke8SaG0QfiJ8MWlLp7r0g8PgYiJ5jTQgp93Y6JR2PeryXkneEIQFkCRgOqmOkWVfzBoJcFpu1omAy3RgKPBdHuE7fy-rZ2jILyJ2zCObWwySsmXNe813p9v8JLAsM9Yf_b5-C7GDPGKsJv_DagfijAbaOHnrdmA9vac7NrRYdmTCZ492J_kyD2d0gLfwz"/>
</div>
<h3 class="font-headline-md text-title-lg text-on-surface mb-1">Rina Wati</h3>
<p class="font-label-md text-primary mb-3">CTO &amp; Co-Founder</p>
<p class="font-body-md text-sm text-on-surface-variant mb-4">Spesialis AI dan Machine Learning dengan PhD dari Universitas ternama.</p>
<div class="flex gap-3 text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">mail</span></a>
</div>
</div>
<!-- Team Member 3 -->
<div class="flex flex-col items-center text-center group">
<div class="relative w-48 h-48 mb-6 overflow-hidden rounded-full ring-4 ring-surface-variant group-hover:ring-primary-container transition-all">
<img alt="CPO" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrt6xB7JKbaoH2zLpcjuk5sfT_LmBRRAa2CCC-ak2u8b-1ztmESK4pz8yzPfH3292duNNBna8aSPeZj_KW0gagHlYber4V0hlk4SGY2swEWke8DujxlAtaZQu_Rs86DXt2mC4kXNQW6Jjavc9fhCrdt9_rfRLicEp_YiQwbZI7T5NJTit5_1C3SmNXAF_yrk2hVmb8ZoXO7yjnpH4fafBPv9wDvDsE9FC1Fq9XAJ9G9pcY7_faoeZ-Y4Vv4jHo-OGTEoHRNY6_HBRw"/>
</div>
<h3 class="font-headline-md text-title-lg text-on-surface mb-1">Andi Pratama</h3>
<p class="font-label-md text-primary mb-3">Chief Product Officer</p>
<p class="font-body-md text-sm text-on-surface-variant mb-4">Pengalaman luas dalam mendesain produk SaaS untuk enterprise &amp; UKM.</p>
<div class="flex gap-3 text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">mail</span></a>
</div>
</div>
<!-- Team Member 4 -->
<div class="flex flex-col items-center text-center group">
<div class="relative w-48 h-48 mb-6 overflow-hidden rounded-full ring-4 ring-surface-variant group-hover:ring-primary-container transition-all">
<img alt="CMO" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupt_XlbfLUichXoFozt0VYE5up1nC7gKF6VZMMWI49zX1pnBMxqn7G5wjEqOSeBC1fLGxN9CnNDzgCRm8lCXunuVbgm_bUqZmv-89FeNHJqJspN2ojDChjvDWjKdwwDsIgl4Dsrm47RsUXctAqxRA-MmtOSMaQr_wT-Oo9ENumkqcSXKSchAQMOU2R7xNsIasbEykmgx0jzbeL6KIsRicPRbD2fSqxPVsapX9prxvLxGd5dufCTYZPfIimMz-ix7FsTwqDxI_shJz"/>
</div>
<h3 class="font-headline-md text-title-lg text-on-surface mb-1">Siti Aminah</h3>
<p class="font-label-md text-primary mb-3">Chief Marketing Officer</p>
<p class="font-body-md text-sm text-on-surface-variant mb-4">Ahli strategi pertumbuhan dengan rekam jejak sukses di startup fintech.</p>
<div class="flex gap-3 text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">mail</span></a>
</div>
</div>
</div>
</section>
<!-- Partners & Trust Section -->
<section class="py-16 bg-surface-container-low border-y border-outline-variant/30">
<div class="max-w-[1240px] mx-auto px-margin-mobile md:px-margin-desktop text-center">
<h3 class="font-label-md text-on-surface-variant mb-8 uppercase tracking-widest">Dipercaya dan Didukung Oleh</h3>
<div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
<div class="font-display-xl text-headline-md text-on-surface">KemenkopUKM</div>
<div class="font-display-xl text-headline-md text-on-surface">TechStartup Indo</div>
<div class="font-display-xl text-headline-md text-on-surface">Bank Nusantara</div>
<div class="font-display-xl text-headline-md text-on-surface">Asosiasi UMKM</div>
</div>
</div>
</section>
</main>
<!-- Footer Component (from COMPONENTS_9) -->
<footer class="w-full py-xl px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-lg bg-on-surface dark:bg-surface-container-lowest">
<div class="flex flex-col items-center md:items-start gap-4">
<span class="font-display-xl text-headline-md font-bold text-white">CashMate</span>
<p class="font-body-md text-body-md text-surface-variant/70 text-center md:text-left max-w-sm">
                © 2024 CashMate AI. Empowering MSMEs through intelligent finance.
            </p>
</div>
<nav class="flex flex-wrap justify-center gap-6">
<a class="font-body-md text-body-md text-surface-variant/70 hover:text-primary-fixed transition-all opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="font-body-md text-body-md text-surface-variant/70 hover:text-primary-fixed transition-all opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="font-body-md text-body-md text-surface-variant/70 hover:text-primary-fixed transition-all opacity-80 hover:opacity-100" href="#">Contact</a>
<a class="font-body-md text-body-md text-surface-variant/70 hover:text-primary-fixed transition-all opacity-80 hover:opacity-100" href="#">LinkedIn</a>
</nav>
</footer>
</body></html>