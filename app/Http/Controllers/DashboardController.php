<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
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

        // Get system statistics
        try {
            DB::connection()->getPdo();
            $dbConnected = true;
            $dbName = DB::connection()->getDatabaseName();
            
            // Try to count tables in database
            $tables = DB::select('SHOW TABLES');
            $tableCount = count($tables);
        } catch (\Exception $e) {
            $dbConnected = false;
            $dbName = config('database.connections.mysql.database');
            $tableCount = 0;
        }

        $sysInfo = [
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'db_name' => $dbName,
            'db_connected' => $dbConnected,
            'table_count' => $tableCount,
        ];

        return view('admin.dashboard', compact('settings', 'sysInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string',
            'hero_subtitle' => 'required|string',
            'cta_whatsapp' => 'required|string',
            'price_starter' => 'required|integer',
            'price_pro' => 'required|integer',
            'price_enterprise' => 'required|string',
        ]);

        $settings = SiteSetting::first();
        if (!$settings) {
            $settings = new SiteSetting();
        }

        $settings->fill($request->only([
            'hero_title',
            'hero_subtitle',
            'cta_whatsapp',
            'price_starter',
            'price_pro',
            'price_enterprise',
        ]));

        $settings->save();

        return redirect()->back()->with('success', 'Pengaturan landing page berhasil disimpan!');
    }
}
