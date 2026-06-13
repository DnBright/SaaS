<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\SiteSetting;

Route::get('/', function () {
    try {
        $settings = SiteSetting::first();
    } catch (\Exception $e) {
        $settings = null;
    }
    
    if (!$settings) {
        $settings = new SiteSetting([
            'hero_title' => "Pantau Ribuan Stok,\nTanpa Bikin Pusing.",
            'hero_subtitle' => 'Tinggalkan spreadsheet manual. Kelola persediaan barang, otomatisasi laporan, dan pantau keluar-masuk stok gudang secara real-time dari satu dashboard cerdas.',
            'cta_whatsapp' => '6281234567890',
            'price_starter' => 149,
            'price_pro' => 499,
            'price_enterprise' => 'Custom',
        ]);
    }
    return view('welcome', compact('settings'));
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/dashboard/update', [DashboardController::class, 'update'])->name('admin.dashboard.update');
