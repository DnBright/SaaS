<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangHub - SaaS Inventory Management</title>
    
    <!-- Google Fonts: Inter for clean SaaS look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Laravel Vite Asset Loading -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased selection:bg-brand-500 selection:text-white">

    @php
        try {
            \DB::connection()->getPdo();
            $dbConnected = true;
            $dbName = \DB::connection()->getDatabaseName();
            $dbError = null;
        } catch (\Exception $e) {
            $dbConnected = false;
            $dbName = config('database.connections.mysql.database');
            $dbError = $e->getMessage();
        }
    @endphp

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-gray-100" id="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="font-bold text-2xl flex items-center gap-2 text-brand-900 tracking-tight">
                <div class="w-8 h-8 bg-brand-500 rounded-lg flex items-center justify-center text-white">
                    <i class="ph-fill ph-package"></i>
                </div>
                Gudang<span class="text-brand-500">Hub</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-600">
                <a href="#fitur" class="hover:text-brand-500 transition-colors">Fitur Utama</a>
                <a href="#solusi" class="hover:text-brand-500 transition-colors">Solusi</a>
                <a href="#harga" class="hover:text-brand-500 transition-colors">Harga</a>
            </div>

            <!-- CTA Buttons (Integrated with Laravel Auth) -->
            <div class="hidden md:flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-brand-900 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-brand-900 transition-colors">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-brand-900 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-brand-500 transition-colors shadow-lg shadow-brand-900/20">
                                Register
                            </a>
                        @endif
                    @endauth
                @else
                    <a href="#harga" class="bg-brand-900 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-brand-500 transition-colors shadow-lg shadow-brand-900/20">
                        Coba Gratis 14 Hari
                    </a>
                @endif
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-2xl text-brand-900">
                <i class="ph ph-list"></i>
            </button>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 px-6 overflow-hidden bg-brand-50 bg-grid-pattern">
        <!-- Glow effect in background -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-brand-500/20 rounded-full blur-[100px] pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto text-center z-10 relative">
            
            <!-- Badges Area -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-8">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-brand-100 text-xs font-semibold text-brand-600 shadow-sm reveal">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-500 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                    </span>
                    SaaS Inventory No.1 di Indonesia
                </div>
                
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border {{ $dbConnected ? 'border-emerald-100 text-emerald-600' : 'border-rose-100 text-rose-600' }} text-xs font-semibold shadow-sm reveal">
                    <span class="relative flex h-2 w-2">
                      <span class="{{ $dbConnected ? 'animate-pulse' : '' }} absolute inline-flex h-full w-full rounded-full {{ $dbConnected ? 'bg-emerald-500' : 'bg-rose-500' }} opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 {{ $dbConnected ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                    </span>
                    Database: <code class="bg-gray-100 px-1 py-0.5 rounded font-mono text-[10px]">{{ $dbName }}</code> ({{ $dbConnected ? 'Connected' : 'Error' }})
                </div>
            </div>
            
            <h1 class="text-5xl lg:text-7xl font-extrabold text-brand-900 tracking-tight leading-[1.1] mb-6 reveal delay-100">
                Pantau Ribuan Stok,<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-teal-400">Tanpa Bikin Pusing.</span>
            </h1>
            
            <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto font-medium reveal delay-200">
                Tinggalkan spreadsheet manual. Kelola persediaan barang, otomatisasi laporan, dan pantau keluar-masuk stok gudang secara real-time dari satu dashboard cerdas.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 reveal delay-300">
                <a href="#harga" class="w-full sm:w-auto bg-brand-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-brand-600 transition-colors shadow-glow flex items-center justify-center gap-2">
                    Mulai Gratis Sekarang <i class="ph-bold ph-arrow-right"></i>
                </a>
                <a href="#fitur" class="w-full sm:w-auto bg-white text-brand-900 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-colors border border-gray-200 shadow-sm flex items-center justify-center gap-2">
                    <i class="ph-fill ph-play-circle text-xl text-brand-500"></i> Lihat Demo
                </a>
            </div>

            <!-- SaaS App Mockup / Visual -->
            <div class="mt-20 relative max-w-5xl mx-auto reveal delay-500 animate-float">
                <div class="rounded-2xl border border-gray-200/50 bg-white/50 backdrop-blur-xl p-2 shadow-2xl relative">
                    <!-- Browser Window Mock -->
                    <div class="bg-brand-900 rounded-xl overflow-hidden shadow-2xl border border-gray-800">
                        <!-- Mac OS Window Buttons -->
                        <div class="bg-slate-800 px-4 py-3 flex gap-2 items-center border-b border-gray-700">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            <div class="mx-auto text-xs text-gray-400 font-medium font-mono">app.gudanghub.id</div>
                        </div>
                        <!-- Abstract Dashboard Image -->
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" alt="Dashboard GudangHub" class="w-full h-auto opacity-90 mix-blend-luminosity">
                        <!-- Overlay gradient to make it look techy -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-brand-900/80 via-transparent to-brand-500/20 pointer-events-none mt-10"></div>
                        
                        <!-- Floating Glass Metric Card (Simulating UI) -->
                        <div class="absolute bottom-8 right-8 glass p-4 rounded-xl shadow-lg border border-white/40 max-w-xs transform hover:scale-105 transition-transform">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <i class="ph-fill ph-trend-up"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-xs text-gray-500 font-semibold uppercase">Stok Aman</p>
                                    <p class="text-xl font-bold text-gray-900">14,230 Item</p>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                <div class="bg-green-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- TRUST BADGES (SOCIAL PROOF) -->
    <section class="py-10 border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-6">Dipercaya oleh 500+ Bisnis di Indonesia</p>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-50 grayscale">
                <!-- Placeholder for Company Logos -->
                <div class="text-xl font-bold font-serif flex items-center gap-1"><i class="ph-fill ph-cube"></i> KargoBox</div>
                <div class="text-xl font-bold font-sans flex items-center gap-1"><i class="ph-fill ph-storefront"></i> TokoMaju</div>
                <div class="text-xl font-bold flex items-center gap-1"><i class="ph-fill ph-shopping-bag"></i> RitelPlus</div>
                <div class="text-xl font-extrabold italic flex items-center gap-1"><i class="ph-fill ph-lightning"></i> FastLogistik</div>
            </div>
        </div>
    </section>

    <!-- FITUR UTAMA SECTION -->
    <section class="py-24 px-6 bg-white" id="fitur">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <h2 class="text-brand-500 font-semibold tracking-wide uppercase text-sm mb-2">Mengapa GudangHub?</h2>
                <h3 class="text-3xl md:text-5xl font-bold text-brand-900 mb-4 tracking-tight">Satu Platform, Semua Terkontrol.</h3>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">Hilangkan human-error dan selisih stok. Otomatisasi alur kerja gudang Anda dengan fitur berstandar enterprise.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-xl hover:bg-white transition-all duration-300 group reveal">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-brand-500 text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-fill ph-scan"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-900 mb-3">Barcode & QR Scanner</h4>
                    <p class="text-gray-600 leading-relaxed">Proses barang masuk dan keluar lebih cepat. Scan via HP atau scanner barcode bluetooth langsung terhubung ke sistem.</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-xl hover:bg-white transition-all duration-300 group reveal delay-100">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-brand-500 text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-fill ph-chart-line-up"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-900 mb-3">Laporan Real-time</h4>
                    <p class="text-gray-600 leading-relaxed">Pantau pergerakan barang, profitabilitas, dan valuasi inventori kapan saja. Export laporan ke Excel atau PDF dalam 1 klik.</p>
                </div>

                <!-- Feature 3 -->
                <div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-xl hover:bg-white transition-all duration-300 group reveal delay-200">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-brand-500 text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-fill ph-warning-circle"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-900 mb-3">Auto Restock Alert</h4>
                    <p class="text-gray-600 leading-relaxed">Jangan sampai kehabisan stok terlaris. Sistem akan mengirim notifikasi otomatis jika stok barang menyentuh batas minimum.</p>
                </div>

                <!-- Feature 4 -->
                <div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-xl hover:bg-white transition-all duration-300 group reveal">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-brand-500 text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-fill ph-users"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-900 mb-3">Multi-User & Role</h4>
                    <p class="text-gray-600 leading-relaxed">Beri akses berbeda untuk admin, kepala gudang, dan staff operasional. Lacak riwayat aktivitas setiap user (Audit Trail).</p>
                </div>

                <!-- Feature 5 -->
                <div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-xl hover:bg-white transition-all duration-300 group reveal delay-100">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-gray-100 flex items-center justify-center text-brand-500 text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ph-fill ph-buildings"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-900 mb-3">Multi-Gudang (Cabang)</h4>
                    <p class="text-gray-600 leading-relaxed">Punya banyak cabang toko atau gudang? Kelola dan transfer stok antar lokasi dengan mudah dalam satu layar terpusat.</p>
                </div>

                <!-- Feature 6 -->
                <div class="p-8 rounded-2xl bg-brand-900 border border-brand-800 shadow-xl reveal delay-200 flex flex-col justify-center items-start text-left">
                    <div class="flex items-center gap-2 text-brand-500 font-semibold mb-2">
                        <i class="ph-bold ph-plug"></i> Integrasi API
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-3">Terkoneksi Ekosistem</h4>
                    <p class="text-gray-400 leading-relaxed mb-6">Integrasikan inventory dengan marketplace (Shopee, Tokopedia) atau sistem ERP akuntansi Anda.</p>
                    <a href="#" class="text-white hover:text-brand-500 font-medium flex items-center gap-1 transition-colors">Lihat Dokumentasi API <i class="ph-bold ph-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE PREVIEW SECTION -->
    <section class="py-24 px-6 bg-brand-900 text-white relative overflow-hidden bg-grid-pattern-dark" id="solusi">
        <!-- Abstract gradient blobs -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-600/20 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16 relative z-10">
            
            <!-- Text Content -->
            <div class="lg:w-1/2 reveal text-left">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight text-white">Data akurat adalah kunci keputusan bisnis yang tepat.</h2>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    GudangHub tidak hanya mencatat, tapi menganalisa. Dashboard analitik kami mengubah data stok yang membosankan menjadi insight visual yang mudah dipahami. Ketahui produk apa yang stagnan dan produk apa yang butuh restock segera.
                </p>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-brand-500/20 flex items-center justify-center text-brand-500 shrink-0 mt-0.5"><i class="ph-bold ph-check"></i></div>
                        <span class="text-gray-300">Prediksi tren penjualan bulanan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-brand-500/20 flex items-center justify-center text-brand-500 shrink-0 mt-0.5"><i class="ph-bold ph-check"></i></div>
                        <span class="text-gray-300">Laporan pergerakan barang (Fast/Slow moving).</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-brand-500/20 flex items-center justify-center text-brand-500 shrink-0 mt-0.5"><i class="ph-bold ph-check"></i></div>
                        <span class="text-gray-300">Tracking HPP (Harga Pokok Penjualan) otomatis.</span>
                    </li>
                </ul>
            </div>

            <!-- Visual Graphic -->
            <div class="lg:w-1/2 w-full reveal delay-200">
                <div class="glass-dark rounded-2xl p-6 shadow-2xl relative">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="font-semibold text-gray-200">Pergerakan Stok (Bulan Ini)</h4>
                        <div class="px-3 py-1 bg-white/10 rounded-lg text-xs">Agustus 2026</div>
                    </div>
                    
                    <!-- Fake Chart -->
                    <div class="h-48 flex items-end gap-2 md:gap-4 justify-between border-b border-gray-700 pb-2">
                        <!-- Bars -->
                        <div class="w-full bg-brand-500/20 hover:bg-brand-500 transition-colors rounded-t-sm relative group h-[40%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">40%</span></div>
                        <div class="w-full bg-brand-500/20 hover:bg-brand-500 transition-colors rounded-t-sm relative group h-[60%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">60%</span></div>
                        <div class="w-full bg-brand-500 hover:bg-brand-400 shadow-glow transition-colors rounded-t-sm relative group h-[90%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">90%</span></div>
                        <div class="w-full bg-brand-500/20 hover:bg-brand-500 transition-colors rounded-t-sm relative group h-[50%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">50%</span></div>
                        <div class="w-full bg-brand-500/20 hover:bg-brand-500 transition-colors rounded-t-sm relative group h-[75%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">75%</span></div>
                        <div class="w-full bg-brand-500/20 hover:bg-brand-500 transition-colors rounded-t-sm relative group h-[30%]"><span class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 bg-white text-black px-2 py-1 rounded">30%</span></div>
                    </div>
                    
                    <div class="flex justify-between mt-4 text-xs text-gray-400">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                    </div>

                    <!-- Floating Alert -->
                    <div class="absolute -left-6 -bottom-6 bg-white text-brand-900 p-4 rounded-xl shadow-xl flex items-center gap-3 border border-gray-100 animate-float text-left" style="animation-delay: 1s;">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-500">
                            <i class="ph-fill ph-bell-ringing"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-red-500 uppercase">Alert</p>
                            <p class="text-sm font-semibold text-brand-900">Stok "Kabel USB-C" sisa 5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING/BERLANGGANAN SECTION -->
    <section class="py-24 px-6 bg-slate-50" id="harga">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <h2 class="text-brand-500 font-semibold tracking-wide uppercase text-sm mb-2">Investasi Transparan</h2>
                <h3 class="text-3xl md:text-5xl font-bold text-brand-900 mb-4 tracking-tight">Pilih Paket Sesuai Skala Bisnis</h3>
                <p class="text-gray-500 max-w-xl mx-auto text-lg">Mulai secara gratis, upgrade kapan saja. Batalkan langganan tanpa biaya tersembunyi.</p>
                
                <!-- Toggle Monthly/Yearly -->
                <div class="inline-flex items-center gap-3 bg-gray-200/50 p-1 rounded-full mt-8 border border-gray-200">
                    <button class="px-6 py-2 rounded-full bg-white shadow text-sm font-semibold text-brand-900">Bulanan</button>
                    <button class="px-6 py-2 rounded-full text-sm font-medium text-gray-500 hover:text-brand-900">Tahunan <span class="text-xs text-green-500 font-bold bg-green-100 px-2 py-0.5 rounded-full ml-1">-20%</span></button>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
                
                <!-- Tier 1: Starter -->
                <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow reveal text-left">
                    <h4 class="text-xl font-bold text-brand-900 mb-2">Starter</h4>
                    <p class="text-sm text-gray-500 mb-6 font-medium">Untuk UMKM & Toko Retail kecil.</p>
                    
                    <div class="mb-6">
                        <span class="text-4xl font-extrabold text-brand-900">Rp 149<span class="text-lg text-gray-500 font-medium">rb</span></span>
                        <span class="text-gray-500 text-sm">/bulan</span>
                    </div>
                    
                    <a href="#" class="block w-full py-3 px-4 bg-brand-50 text-brand-600 font-semibold text-center rounded-xl hover:bg-brand-100 transition-colors mb-8">
                        Mulai Trial 14 Hari
                    </a>

                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Maks. 1.000 SKU Barang</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> 1 Lokasi Gudang</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> 2 User Admin</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Scan Barcode Dasar</li>
                        <li class="flex items-center gap-3 opacity-50"><i class="ph-bold ph-x text-gray-400"></i> Multi-cabang</li>
                    </ul>
                </div>

                <!-- Tier 2: Pro (Highlighted) -->
                <div class="bg-brand-900 rounded-3xl p-8 border border-brand-800 shadow-2xl shadow-brand-900/20 transform md:-translate-y-4 relative reveal delay-100 text-left">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-brand-400 to-teal-400 text-brand-950 px-4 py-1 rounded-full text-xs font-bold tracking-wide shadow-sm">
                        PALING POPULER
                    </div>
                    
                    <h4 class="text-xl font-bold text-white mb-2">Professional</h4>
                    <p class="text-sm text-brand-100/70 mb-6 font-medium">Untuk Distributor & Bisnis Berkembang.</p>
                    
                    <div class="mb-6">
                        <span class="text-4xl font-extrabold text-white">Rp 499<span class="text-lg text-brand-100/50 font-medium">rb</span></span>
                        <span class="text-brand-100/50 text-sm">/bulan</span>
                    </div>
                    
                    <a href="#" class="block w-full py-3 px-4 bg-brand-500 text-white font-semibold text-center rounded-xl hover:bg-brand-400 shadow-glow transition-all mb-8">
                        Pilih Paket Pro
                    </a>

                    <ul class="space-y-4 text-sm text-gray-300">
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-400"></i> Unlimited SKU Barang</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-400"></i> Hingga 5 Lokasi Gudang</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-400"></i> 10 User Role (Admin/Staff)</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-400"></i> Advanced Analytics & Report</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-400"></i> Auto Restock Alert</li>
                    </ul>
                </div>

                <!-- Tier 3: Enterprise -->
                <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow reveal delay-200 text-left">
                    <h4 class="text-xl font-bold text-brand-900 mb-2">Enterprise</h4>
                    <p class="text-sm text-gray-500 mb-6 font-medium">Solusi custom untuk pabrik & korporasi.</p>
                    
                    <div class="mb-6">
                        <span class="text-4xl font-extrabold text-brand-900">Custom</span>
                    </div>
                    
                    <a href="#" class="block w-full py-3 px-4 bg-white border border-gray-300 text-brand-900 font-semibold text-center rounded-xl hover:bg-gray-50 transition-colors mb-8">
                        Hubungi Sales
                    </a>

                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Semua fitur Professional</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Lokasi Gudang & User Unlimited</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Akses API Terbuka</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Integrasi ERP Spesifik</li>
                        <li class="flex items-center gap-3"><i class="ph-bold ph-check text-brand-500"></i> Dedicated Account Manager</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- BOTTOM CTA -->
    <section class="py-20 px-6 bg-brand-500 relative overflow-hidden text-center">
        <!-- Abstract wave background -->
        <svg class="absolute bottom-0 left-0 w-full text-brand-600 opacity-30 animate-float" viewBox="0 0 1440 320" preserveAspectRatio="none" style="height: 100%; z-index: 0;"><path fill="currentColor" fill-opacity="1" d="M0,224L60,213.3C120,203,240,181,360,186.7C480,192,600,224,720,213.3C840,203,960,149,1080,138.7C1200,128,1320,160,1380,176L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        
        <div class="max-w-3xl mx-auto relative z-10 reveal">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight">Siap merapikan gudang Anda?</h2>
            <p class="text-brand-50 text-lg mb-10 font-medium">Gabung dengan ratusan pebisnis yang telah menghemat waktu operasional dan meminimalisir kehilangan barang.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-brand-900 text-white px-8 py-4 rounded-xl font-bold hover:bg-gray-900 shadow-xl transition-all">
                    Daftar & Coba Gratis
                </a>
                <a href="#" class="bg-white/20 backdrop-blur text-white border border-white/30 px-8 py-4 rounded-xl font-bold hover:bg-white/30 transition-all flex items-center justify-center gap-2">
                    <i class="ph-fill ph-whatsapp text-xl"></i> Konsultasi via WA
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-50 border-t border-gray-200 pt-16 pb-8 px-6 text-gray-600">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8 mb-12">
            <div class="col-span-1 md:col-span-1 text-left">
                <a href="#" class="font-bold text-xl flex items-center gap-2 text-brand-900 mb-4">
                    <i class="ph-fill ph-package text-brand-500"></i> GudangHub
                </a>
                <p class="text-sm mb-6">Solusi cerdas manajemen inventori berbasis cloud untuk pebisnis modern Indonesia.</p>
                <div class="flex gap-4 text-xl">
                    <a href="#" class="text-gray-400 hover:text-brand-500 transition-colors"><i class="ph-fill ph-linkedin-logo"></i></a>
                    <a href="#" class="text-gray-400 hover:text-brand-500 transition-colors"><i class="ph-fill ph-instagram-logo"></i></a>
                    <a href="#" class="text-gray-400 hover:text-brand-500 transition-colors"><i class="ph-fill ph-facebook-logo"></i></a>
                </div>
            </div>
            
            <div class="text-left">
                <h4 class="font-bold text-brand-900 mb-4">Produk</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Fitur Inventory</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Barcode System</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Harga Berlangganan</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Download App</a></li>
                </ul>
            </div>

            <div class="text-left">
                <h4 class="font-bold text-brand-900 mb-4">Perusahaan</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Blog & Artikel</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Karir</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="text-left">
                <h4 class="font-bold text-brand-900 mb-4">Bantuan</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Pusat Bantuan (FAQ)</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Dokumentasi API</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-brand-500 transition-colors">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto text-center border-t border-gray-200 pt-8 text-sm">
            <p>&copy; 2026 GudangHub by PT Teknologi Inventori Nusantara. All rights reserved.</p>
        </div>
    </footer>

    <!-- JAVASCRIPT ANIMATION -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');

            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                const elementVisible = 100;

                reveals.forEach((reveal) => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                    }
                });
            };

            // Initial check
            revealOnScroll();
            window.addEventListener('scroll', revealOnScroll);
            
            // Navbar Background modification on scroll
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    navbar.classList.add('shadow-sm');
                    navbar.classList.replace('py-4', 'py-3');
                } else {
                    navbar.classList.remove('shadow-sm');
                    navbar.classList.replace('py-3', 'py-4');
                }
            });
        });
    </script>
</body>
</html>
