<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\SiteSetting::create([
            'hero_title' => "Pantau Ribuan Stok,\nTanpa Bikin Pusing.",
            'hero_subtitle' => 'Tinggalkan spreadsheet manual. Kelola persediaan barang, otomatisasi laporan, dan pantau keluar-masuk stok gudang secara real-time dari satu dashboard cerdas.',
            'cta_whatsapp' => '6281234567890',
            'price_starter' => 149,
            'price_pro' => 499,
            'price_enterprise' => 'Custom',
        ]);
    }
}
