<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DnBright SaaS - Control Panel</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Laravel Vite Asset Loading -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased selection:bg-brand-500 selection:text-white overflow-x-hidden">

    <!-- Decorative background blobs -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[120px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none -z-10"></div>

    <div class="min-h-screen flex flex-col relative z-10">
        
        <!-- HEADER -->
        <header class="w-full border-b border-slate-900 bg-slate-950/80 backdrop-blur-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-500 to-teal-600 flex items-center justify-center shadow-lg shadow-brand-500/20">
                        <i class="ph-bold ph-sliders-horizontal text-xl text-white"></i>
                    </div>
                    <div>
                        <span class="text-lg font-bold tracking-tight text-white block">DnBright SaaS</span>
                        <span class="text-xs text-slate-500 font-medium">Control Panel & Settings</span>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-white transition-colors bg-slate-900 border border-slate-800 px-4 py-2 rounded-lg">
                        <i class="ph ph-arrow-square-out text-lg"></i> Lihat Landing Page
                    </a>
                </div>
            </div>
        </header>

        <!-- MAIN CONTAINER -->
        <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-10">
            
            <!-- ALERT NOTIFIKASI -->
            @if(session('success'))
                <div class="mb-8 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3 animate-slide-up">
                    <i class="ph-fill ph-check-circle text-2xl"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- ROW GRID: SYSTEM STATS & SETTINGS FORM -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- COLUMN 1: SYSTEM MONITORING -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-slate-900/40 border border-slate-900 rounded-2xl p-6 backdrop-blur-sm shadow-xl">
                        <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2 border-b border-slate-900 pb-3">
                            <i class="ph-bold ph-activity text-brand-500"></i> Status Proyek & System
                        </h3>
                        
                        <div class="space-y-4">
                            <!-- DB CONNECTION STATUS -->
                            <div class="p-4 rounded-xl bg-slate-950 border border-slate-900 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-500 block font-semibold uppercase">Database MySQL</span>
                                    <span class="text-sm font-mono text-slate-300">{{ $sysInfo['db_name'] }}</span>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold {{ $sysInfo['db_connected'] ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-rose-500/10 text-rose-400 border border-rose-500/20' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $sysInfo['db_connected'] ? 'bg-emerald-400' : 'bg-rose-400' }} mr-1.5 {{ $sysInfo['db_connected'] ? 'animate-pulse' : '' }}"></span>
                                    {{ $sysInfo['db_connected'] ? 'Connected' : 'Error' }}
                                </span>
                            </div>

                            <!-- MIGRATED TABLES COUNT -->
                            <div class="p-4 rounded-xl bg-slate-950 border border-slate-900 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-500 block font-semibold uppercase">Tabel Database</span>
                                    <span class="text-sm text-slate-300 font-semibold">{{ $sysInfo['table_count'] }} tabel terdeteksi</span>
                                </div>
                                <i class="ph-bold ph-database text-xl text-slate-600"></i>
                            </div>

                            <!-- LARAVEL VERSION -->
                            <div class="p-4 rounded-xl bg-slate-950 border border-slate-900 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-500 block font-semibold uppercase">Versi Framework</span>
                                    <span class="text-sm text-slate-300 font-semibold">Laravel v{{ $sysInfo['laravel_version'] }}</span>
                                </div>
                                <i class="ph-bold ph-terminal-window text-xl text-slate-600"></i>
                            </div>

                            <!-- PHP VERSION -->
                            <div class="p-4 rounded-xl bg-slate-950 border border-slate-900 flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-slate-500 block font-semibold uppercase">Versi PHP</span>
                                    <span class="text-sm text-slate-300 font-semibold">PHP {{ $sysInfo['php_version'] }}</span>
                                </div>
                                <i class="ph-bold ph-code text-xl text-slate-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- TIPS / INFORMATION CARD -->
                    <div class="bg-slate-900/20 border border-slate-900 rounded-2xl p-6">
                        <h4 class="text-sm font-bold text-white mb-2 flex items-center gap-2"><i class="ph ph-info text-brand-500"></i> Petunjuk Penggunaan</h4>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Perubahan pada form di samping akan langsung disimpan ke database MySQL dan langsung merubah isi teks/harga di halaman depan (Landing Page) secara real-time. Pastikan format harga menggunakan nominal angka saja tanpa titik (contoh: 149000).
                        </p>
                    </div>
                </div>

                <!-- COLUMN 2 & 3: SETTINGS FORM -->
                <div class="lg:col-span-2">
                    <form action="{{ route('admin.dashboard.update') }}" method="POST" class="bg-slate-900/40 border border-slate-900 rounded-2xl p-8 backdrop-blur-sm shadow-xl space-y-6 text-left">
                        @csrf
                        
                        <h3 class="text-lg font-bold text-white flex items-center gap-2 border-b border-slate-900 pb-4">
                            <i class="ph-bold ph-browser text-brand-500"></i> Pengaturan Konten Landing Page
                        </h3>

                        <!-- HERO TITLE -->
                        <div class="space-y-2">
                            <label for="hero_title" class="block text-sm font-semibold text-slate-300">Judul Utama Hero (Hero Title)</label>
                            <textarea name="hero_title" id="hero_title" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors font-semibold" placeholder="Masukkan judul hero">{{ $settings->hero_title }}</textarea>
                            <span class="text-[11px] text-slate-500 block">Gunakan baris baru (\n) untuk merapikan pemisahan teks.</span>
                        </div>

                        <!-- HERO SUBTITLE -->
                        <div class="space-y-2">
                            <label for="hero_subtitle" class="block text-sm font-semibold text-slate-300">Subjudul Hero (Hero Subtitle)</label>
                            <textarea name="hero_subtitle" id="hero_subtitle" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-300 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors leading-relaxed" placeholder="Masukkan deskripsi hero">{{ $settings->hero_subtitle }}</textarea>
                        </div>

                        <!-- CONTACT WHATSAPP -->
                        <div class="space-y-2">
                            <label for="cta_whatsapp" class="block text-sm font-semibold text-slate-300">Nomor WhatsApp CTA (Konsultasi WA)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 text-sm font-semibold pointer-events-none">+</span>
                                <input type="text" name="cta_whatsapp" id="cta_whatsapp" value="{{ $settings->cta_whatsapp }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-8 pr-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors font-mono" placeholder="628123456789">
                            </div>
                            <span class="text-[11px] text-slate-500 block">Masukkan nomor dengan kode negara di awal tanpa tanda hubung atau spasi (contoh: 6281234567890).</span>
                        </div>

                        <h4 class="text-sm font-bold text-white border-t border-slate-900 pt-6 mt-6 flex items-center gap-2">
                            <i class="ph-bold ph-tag text-brand-500"></i> Pengaturan Harga Paket Berlangganan
                        </h4>

                        <!-- PRICING CARDS ROW -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- STARTER -->
                            <div class="space-y-2">
                                <label for="price_starter" class="block text-xs font-semibold text-slate-400">Starter Price (Rp/Bulan)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500 text-xs font-semibold pointer-events-none">Rp</span>
                                    <input type="number" name="price_starter" id="price_starter" value="{{ $settings->price_starter }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-8 pr-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors font-bold font-mono" placeholder="149000">
                                </div>
                            </div>
                            
                            <!-- PRO -->
                            <div class="space-y-2">
                                <label for="price_pro" class="block text-xs font-semibold text-slate-400">Pro Price (Rp/Bulan)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500 text-xs font-semibold pointer-events-none">Rp</span>
                                    <input type="number" name="price_pro" id="price_pro" value="{{ $settings->price_pro }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-8 pr-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors font-bold font-mono" placeholder="499000">
                                </div>
                            </div>

                            <!-- ENTERPRISE -->
                            <div class="space-y-2">
                                <label for="price_enterprise" class="block text-xs font-semibold text-slate-400">Enterprise Price Label</label>
                                <input type="text" name="price_enterprise" id="price_enterprise" value="{{ $settings->price_enterprise }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors font-bold font-mono" placeholder="Custom / Hubungi Sales">
                            </div>
                        </div>

                        <!-- BUTTON SUBMIT -->
                        <div class="border-t border-slate-900 pt-6 mt-8 flex justify-end">
                            <button type="submit" class="bg-brand-500 text-white px-6 py-3.5 rounded-xl font-bold hover:bg-brand-600 transition-colors shadow-glow flex items-center gap-2 cursor-pointer">
                                <i class="ph-bold ph-floppy-disk text-lg"></i> Simpan Konfigurasi
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </main>

        <!-- FOOTER -->
        <footer class="w-full border-t border-slate-900 py-6 text-center text-xs text-slate-500 mt-auto bg-slate-950">
            <p>&copy; {{ date('Y') }} DnBright SaaS. All rights reserved.</p>
        </footer>

    </div>

</body>
</html>
