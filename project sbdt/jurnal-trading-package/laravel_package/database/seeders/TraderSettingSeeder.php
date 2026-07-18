<?php

namespace Database\Seeders;

use App\Models\TraderSetting;
use Illuminate\Database\Seeder;

class TraderSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Diambil dari sheet "Pengaturan" & "Dashboard" di file Jurnal_Trading_Backtes.xlsx
        TraderSetting::create([
            'nama_trader' => 'Trader Utama', // ganti sesuai nama kamu
            'modal_awal' => 1000000,
            'sl_harian_pct' => 50,
            'target_return_pct' => null,
        ]);

        $this->command->info('Berhasil import trader settings.');
    }
}
