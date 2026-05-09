# CashMate Antigravity — 1-Week Sprint Plan

> **Sprint:** 9–15 Mei 2026 · **Stack:** Laravel 12 + Tailwind v4 + Vite 7 · **Status:** Project masih boilerplate default

---

## Current State

Project masih 100% boilerplate Laravel 12:
- Hanya `welcome.blade.php` (default)
- Belum ada controller, model, migration, atau view custom
- Tailwind v4 sudah terinstall & configured
- Database SQLite siap pakai

---

## Scope Decision Matrix

Setiap fitur dari plan 6-minggu dikategorikan:

| Status | Arti |
|---|---|
| ✅ **KEEP** | Wajib ada, dikerjakan penuh |
| 🟡 **SIMPLIFY** | Tetap ada tapi scope dikurangi |
| ❌ **CUT** | Ditunda ke v2, tidak masuk sprint ini |

---

### Design System & Components

| Fitur | Keputusan | Alasan |
|---|---|---|
| CSS Design Tokens (warna, font, spacing) | ✅ KEEP | Fondasi semua UI, harus dikerjakan pertama |
| Google Fonts (Inter + JetBrains Mono) | ✅ KEEP | Mudah, dampak besar pada tampilan |
| GlassCard component | ✅ KEEP | Reusable di semua halaman |
| AppLayout (sidebar + topbar) | ✅ KEEP | Layout utama aplikasi |
| GuestLayout (landing/auth) | ✅ KEEP | Layout untuk halaman publik |
| Float animation keyframes | 🟡 SIMPLIFY | Hanya 1 animasi `float` sederhana, bukan set lengkap |
| ParticleCanvas (Canvas API 60fps) | ❌ **CUT** | Berat, butuh tuning performa, bisa ditambah nanti |
| Glass Shimmer hover effect | ❌ **CUT** | Polish, bukan core functionality |
| BottomNavBar (Mobile) | 🟡 SIMPLIFY | Responsive sidebar collapse saja, bukan bottom bar terpisah |

### Landing Page

| Fitur | Keputusan | Alasan |
|---|---|---|
| Hero section + CTA | ✅ KEEP | First impression, wajib ada |
| Feature cards (3 kolom) | ✅ KEEP | Menjelaskan value proposition |
| Floating icons animasi | 🟡 SIMPLIFY | CSS float saja, tanpa Canvas particles |
| Particle background | ❌ **CUT** | Eye candy, bukan prioritas |
| Demo video/preview | ❌ **CUT** | Belum ada yang bisa di-demo |

### Authentication

| Fitur | Keputusan | Alasan |
|---|---|---|
| Login page (glassmorphism) | ✅ KEEP | Core flow |
| Register page | ✅ KEEP | Core flow |
| Auth controllers & routes | ✅ KEEP | Menggunakan Laravel Breeze agar cepat |
| Custom auth dari nol | ❌ **CUT** | Breeze sudah cukup untuk sprint ini |

### Dashboard

| Fitur | Keputusan | Alasan |
|---|---|---|
| StatWidget (pemasukan/pengeluaran/saldo) | ✅ KEEP | Inti dashboard |
| Recent transactions list | ✅ KEEP | Essential information |
| Quick actions panel | ✅ KEEP | UX shortcut penting |
| CashFlowChart 3D interactive | 🟡 **SIMPLIFY** → Chart.js 2D | 3D terlalu lama, 2D dengan gradient sudah cukup bagus |
| Chart bounce animation | ❌ **CUT** | Polish |

### Upload & OCR

| Fitur | Keputusan | Alasan |
|---|---|---|
| DragDropZone (file upload) | ✅ KEEP | Core feature |
| Camera capture (mobile) | ✅ KEEP | Esensial untuk UMKM |
| Google AI Studio OCR integration | ✅ KEEP | Diferensiasi utama app |
| OcrProcessingOverlay (loading view) | 🟡 SIMPLIFY | Simple loading spinner + progress, tanpa scan-line animation |
| Gravity Pull animation (file drop) | ❌ **CUT** | Cool tapi bukan prioritas |
| Data Fly-Out animation (ke tabel) | ❌ **CUT** | Cool tapi bukan prioritas |
| Upload history | 🟡 SIMPLIFY | Simple list saja |

### Review & Transactions

| Fitur | Keputusan | Alasan |
|---|---|---|
| ReviewPage (editable extracted data) | ✅ KEEP | User harus bisa koreksi OCR |
| TransactionTable + filters | ✅ KEEP | Core feature |
| CRUD operations | ✅ KEEP | Core feature |
| CategoryBalls (physics visualization) | ❌ **CUT** | Gimmick visual, bukan essential |
| Ball Physics animation | ❌ **CUT** | Berat & kompleks |

### Reports

| Fitur | Keputusan | Alasan |
|---|---|---|
| Arus Kas report page | ✅ KEEP | Core business value |
| Laba/Rugi report | 🟡 SIMPLIFY | Basic table view, tanpa chart interaktif |
| Export PDF (DomPDF) | ✅ KEEP | UMKM butuh cetak laporan |
| Export Excel (Maatwebsite) | ❌ **CUT** | PDF cukup untuk v1, Excel nanti |
| 3D Chart interaktif di report | ❌ **CUT** | Chart.js 2D sudah cukup |
| Floating download animation | ❌ **CUT** | Polish |

### Settings

| Fitur | Keputusan | Alasan |
|---|---|---|
| Profil Usaha | ✅ KEEP | Basic profile |
| Kategori Custom | 🟡 SIMPLIFY | Preset categories + simple add, bukan full CRUD |
| Preferensi (tema, bahasa) | ❌ **CUT** | Nice to have |

### Testing & Polish

| Fitur | Keputusan | Alasan |
|---|---|---|
| Feature tests (Pest) | 🟡 SIMPLIFY | Hanya critical path: auth + upload + save |
| Browser tests | ❌ **CUT** | Terlalu lama setup |
| Lighthouse audit | ❌ **CUT** | Post-launch |
| Mobile responsive | 🟡 SIMPLIFY | Basic responsive saja, bukan pixel-perfect |
| Performance optimization | ❌ **CUT** | Post-launch |

---

## Summary: Apa yang DI-CUT

### ❌ Fitur yang Ditunda ke V2

1. **ParticleCanvas** — background animasi canvas 60fps
2. **CategoryBalls** — physics-based category visualization
3. **3D Charts** — semua chart jadi 2D dengan gradient
4. **Gravity Pull / Data Fly-Out animation** — animasi saat upload
5. **Glass Shimmer** — hover effect pada card
6. **Export Excel** — PDF saja dulu
7. **Bottom Nav Bar mobile** — sidebar collapse saja
8. **Browser tests** — manual testing dulu
9. **Chart bounce animation** — hover effect chart
10. **Preferensi settings** — tema & bahasa
11. **Demo video di landing** — belum ada yang bisa di-demo

> [!IMPORTANT]
> **Total effort yang di-cut: ~40% dari plan asli.** Mayoritas yang di-cut adalah **animasi/visual polish**, bukan fungsionalitas inti. Semua core UMKM flow tetap utuh.

---

## 1-Week Sprint Schedule

### 📅 Hari 1 — Jumat 9 Mei: Foundation + Design System

| Task | Detail | Est. |
|---|---|---|
| Design tokens di `app.css` | Color palette, typography, spacing, glassmorphism utilities | 1.5h |
| Install Laravel Breeze | `composer require laravel/breeze` + scaffolding | 0.5h |
| Google Fonts setup | Inter + JetBrains Mono via Vite | 0.5h |
| AppLayout component | Sidebar nav + topbar, responsive collapse | 2h |
| GuestLayout component | Clean dark layout untuk auth/landing | 1h |
| GlassCard component | Reusable Blade component | 0.5h |
| Float animation CSS | Keyframes untuk elemen floating | 0.5h |

**Deliverable:** Layout system berfungsi, bisa navigate antar halaman kosong

---

### 📅 Hari 2 — Sabtu 10 Mei: Landing Page + Auth

| Task | Detail | Est. |
|---|---|---|
| Landing page | Hero + floating icons (CSS only) + feature cards + footer | 3h |
| Customize Login view | Glassmorphism form sesuai design system | 1.5h |
| Customize Register view | Glassmorphism form sesuai design system | 1h |
| Auth routes & middleware | Breeze default + custom redirects | 0.5h |

**Deliverable:** User bisa register, login, dan melihat landing page

---

### 📅 Hari 3 — Minggu 11 Mei: Database + Dashboard

| Task | Detail | Est. |
|---|---|---|
| Migrations | `businesses`, `categories`, `transactions`, `receipts` | 1.5h |
| Models + Factories | Eloquent models dengan relationships + seeder | 1.5h |
| Dashboard controller | Query summary data | 1h |
| StatWidget component | 3 cards: pemasukan/pengeluaran/saldo | 1h |
| Cash Flow Chart (2D) | Chart.js bar chart dengan gradient | 1.5h |
| Recent transactions list | Simple list dari 5 transaksi terbaru | 0.5h |
| Quick actions panel | Buttons: Scan Nota, Tambah Manual, Lihat Laporan | 0.5h |

**Deliverable:** Dashboard fungsional dengan data seeder

---

### 📅 Hari 4 — Senin 12 Mei: Upload + OCR Integration

| Task | Detail | Est. |
|---|---|---|
| Upload page UI | DragDropZone + camera capture button | 2h |
| File upload backend | Controller + validation + storage | 1h |
| Google AI Studio service | OCR service class + API integration | 2.5h |
| Processing overlay | Simple loading spinner + extracted data preview | 1h |
| Upload history | Simple list of recent uploads | 0.5h |

**Deliverable:** User bisa upload foto nota dan lihat hasil OCR

---

### 📅 Hari 5 — Selasa 13 Mei: Review + Transactions

| Task | Detail | Est. |
|---|---|---|
| Review page | Editable table dari hasil OCR + category dropdown | 2h |
| Save to database flow | Approve → simpan transactions ke DB | 1h |
| Transaction list page | Full list + filter (tanggal, kategori, tipe) | 2h |
| Transaction CRUD | Edit & delete existing transactions | 1.5h |
| Manual transaction add | Form untuk tambah manual tanpa OCR | 0.5h |

**Deliverable:** Full transaction lifecycle: upload → review → save → manage

---

### 📅 Hari 6 — Rabu 14 Mei: Reports + Settings

| Task | Detail | Est. |
|---|---|---|
| Arus Kas report | Chart.js line chart + summary table | 2h |
| Laba/Rugi report | Basic table view income vs expense | 1.5h |
| Export PDF | DomPDF integration + styled template | 2h |
| Settings: Profil Usaha | Form edit nama toko, alamat, dll | 1h |
| Settings: Kategori | Preset list + simple add new | 0.5h |

**Deliverable:** User bisa lihat laporan dan export PDF

---

### 📅 Hari 7 — Kamis 15 Mei: Polish + Testing

| Task | Detail | Est. |
|---|---|---|
| Responsive pass | Cek semua halaman di mobile viewport | 1.5h |
| Pest feature tests | Auth flow + upload + transaction save | 2h |
| Bug fixes | Dari testing manual | 2h |
| Final UI polish | Spacing, alignment, color consistency | 1h |
| Pint formatting | `vendor/bin/pint --dirty` | 0.5h |

**Deliverable:** App siap demo, responsive, tested

---

## Open Questions

> [!IMPORTANT]
> 1. **Google AI Studio API Key:** Sudah punya atau perlu bikin baru? Ini blocker untuk Hari 4.
> 2. **Auth method:** Boleh pakai Laravel Breeze untuk percepatan? Atau harus custom?
> 3. **Chart library:** Chart.js OK untuk versi 2D, atau ada preferensi lain?
> 4. **Bahasa UI:** Full Bahasa Indonesia?
> 5. **Hari kerja:** Sprint mulai hari ini (Jumat 9 Mei) atau mulai Senin depan?

---

## Verification Plan

### Automated Tests
- `php artisan test --compact` — critical path tests only
- Auth: register → login → access dashboard
- Upload: file upload → OCR response → save transaction
- Report: generate PDF download

### Manual Verification
- Visual QA di Chrome desktop + mobile viewport
- Test upload foto nota asli (bukan dummy)
- Verify PDF export output

---

## V2 Backlog (Post-Sprint)

Fitur yang di-cut akan masuk backlog untuk sprint berikutnya:

1. ParticleCanvas background animation
2. CategoryBalls physics visualization  
3. 3D interactive charts
4. Gravity Pull & Data Fly-Out animations
5. Export Excel (Maatwebsite)
6. Bottom navigation bar (mobile native feel)
7. Glass Shimmer hover effects
8. Chart bounce animations
9. Preferensi settings (tema/bahasa)
10. Browser tests & Lighthouse audit
11. PWA offline support
12. Performance optimization & code splitting
