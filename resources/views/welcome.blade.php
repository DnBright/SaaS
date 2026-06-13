<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel + Tailwind CSS + MySQL Setup</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-100 font-['Plus_Jakarta_Sans',sans-serif] antialiased selection:bg-indigo-500 selection:text-white overflow-x-hidden">
    
    <!-- Decorative background blobs -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-600/20 rounded-full blur-3xl translate-y-1/2 pointer-events-none"></div>

    <div class="min-h-screen flex flex-col justify-between relative z-10">
        
        <!-- Header / Navigation -->
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-between border-b border-slate-900">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-600 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <span class="text-lg font-bold tracking-tight bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">DnBright SaaS</span>
            </div>
            
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5 animate-pulse"></span>
                    Local Environment
                </span>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12 px-6">
            <div class="w-full max-w-4xl">
                <!-- Hero Section -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                        Laravel &amp; Tailwind CSS <br>
                        <span class="bg-gradient-to-r from-indigo-400 via-violet-400 to-pink-400 bg-clip-text text-transparent">Connected to MySQL Database</span>
                    </h1>
                    <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                        Your modern SaaS framework development stack is fully initialized, configured, and ready to go.
                    </p>
                </div>

                @php
                    try {
                        \DB::connection()->getPdo();
                        $dbStatus = 'connected';
                        $dbName = \DB::connection()->getDatabaseName();
                        $dbError = null;
                    } catch (\Exception $e) {
                        $dbStatus = 'error';
                        $dbName = config('database.connections.mysql.database');
                        $dbError = $e->getMessage();
                    }
                @endphp

                <!-- Connection status cards grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    
                    <!-- Laravel Card -->
                    <div class="bg-slate-900/40 border border-slate-900 rounded-2xl p-6 backdrop-blur-sm shadow-xl flex flex-col justify-between hover:border-slate-800 transition-colors">
                        <div>
                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Framework</div>
                            <h3 class="text-xl font-bold text-white mb-2">Laravel 12</h3>
                            <p class="text-slate-400 text-sm">Engineered for web artisans, providing powerful routing, templating, and Eloquent ORM.</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between text-xs text-slate-500">
                            <span>PHP Version</span>
                            <span class="font-mono bg-slate-950 px-2 py-0.5 rounded text-indigo-400 font-semibold">{{ PHP_VERSION }}</span>
                        </div>
                    </div>

                    <!-- Tailwind Card -->
                    <div class="bg-slate-900/40 border border-slate-900 rounded-2xl p-6 backdrop-blur-sm shadow-xl flex flex-col justify-between hover:border-slate-800 transition-colors">
                        <div>
                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Styling</div>
                            <h3 class="text-xl font-bold text-white mb-2">Tailwind CSS v4</h3>
                            <p class="text-slate-400 text-sm">Utility-first CSS framework configured via modern Vite compilation for rapid UI development.</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between text-xs text-slate-500">
                            <span>Vite Server</span>
                            <span class="font-mono bg-slate-950 px-2 py-0.5 rounded text-violet-400 font-semibold">Ready</span>
                        </div>
                    </div>

                    <!-- MySQL Card -->
                    <div class="bg-slate-900/40 border border-slate-900 rounded-2xl p-6 backdrop-blur-sm shadow-xl flex flex-col justify-between hover:border-slate-800 transition-colors">
                        <div>
                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Database</div>
                            <h3 class="text-xl font-bold text-white mb-2">MySQL Connection</h3>
                            <p class="text-slate-400 text-sm">Relational storage configured in <code class="text-slate-300 font-mono text-xs">.env</code> and initialized with schema migrations.</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-xs text-slate-500">Database Name</span>
                            <span class="font-mono bg-slate-950 px-2 py-0.5 rounded text-pink-400 text-xs font-semibold">{{ $dbName }}</span>
                        </div>
                    </div>

                </div>

                <!-- Database status panel -->
                <div class="bg-slate-900/30 border border-slate-900 rounded-2xl p-8 backdrop-blur-sm shadow-xl">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                        <div class="flex items-start gap-4">
                            <div class="p-3 rounded-xl {{ $dbStatus === 'connected' ? 'bg-emerald-500/10' : 'bg-rose-500/10' }} flex-shrink-0">
                                @if($dbStatus === 'connected')
                                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                @else
                                    <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white mb-1">
                                    MySQL Connection: {{ $dbStatus === 'connected' ? 'Connected Successfully' : 'Connection Failed' }}
                                </h4>
                                <p class="text-sm text-slate-400">
                                    @if($dbStatus === 'connected')
                                        Laravel successfully established a database session on database <code class="text-slate-300 font-mono text-xs bg-slate-950 px-1 py-0.5 rounded">{{ $dbName }}</code>. Ready to write queries!
                                    @else
                                        Could not connect to database <code class="text-slate-300 font-mono text-xs bg-slate-950 px-1 py-0.5 rounded">{{ $dbName }}</code>. Check your database settings and make sure MySQL service is running.
                                    @endif
                                </p>
                                @if($dbError)
                                    <div class="mt-3 bg-rose-950/20 border border-rose-500/20 p-3 rounded-lg text-xs font-mono text-rose-300">
                                        {{ $dbError }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="w-full md:w-auto flex-shrink-0">
                            @if($dbStatus === 'connected')
                                <span class="block text-center px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-lg text-emerald-400 font-semibold text-sm">
                                    Active Database
                                </span>
                            @else
                                <a href="https://laravel.com/docs/12.x/database" target="_blank" class="block text-center px-4 py-2 bg-slate-900 border border-slate-800 hover:bg-slate-800 rounded-lg text-white font-semibold text-sm transition-colors">
                                    Database Docs
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full max-w-7xl mx-auto px-6 py-6 border-t border-slate-900 text-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} DnBright SaaS. Powered by Laravel &amp; Tailwind CSS.</p>
        </footer>

    </div>
</body>
</html>
