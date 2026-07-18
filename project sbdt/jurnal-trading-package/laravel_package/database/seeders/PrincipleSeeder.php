<?php

namespace Database\Seeders;

use App\Models\Principle;
use Illuminate\Database\Seeder;

class PrincipleSeeder extends Seeder
{
    public function run(): void
    {
        // Diambil dari sheet "Prinsip" di file Jurnal_Trading_Backtes.xlsx
        $principles = [
            ['kode' => 'P01', 'judul' => 'Satu metode dikuasai — bukan banyak metode setengah-setengah', 'penjelasan' => 'Banyak metode = modal habis. Satu metode dikuasai = survive.'],
            ['kode' => 'P02', 'judul' => 'Cari yang nyaman — bukan yang paling canggih', 'penjelasan' => 'Metode nyaman = bisa dijalankan konsisten. Posisi nginep bikin tidak tenang? Jangan pakai itu.'],
            ['kode' => 'P03', 'judul' => 'Fokusnya cari duit — bukan cari sensasi', 'penjelasan' => 'Trading = cari duit. Bukan cari adrenalin atau pengalaman seru.'],
            ['kode' => 'P04', 'judul' => 'Money management melindungi dari diri sendiri', 'penjelasan' => 'Streak profit 10x → overconfidence → besarkan lot → loss besar. MM ada persis untuk momen itu.'],
            ['kode' => 'P05', 'judul' => 'Tidak ada probabilitas 100% — tidak akan pernah ada', 'penjelasan' => 'Yang ada: metode dengan edge yang cukup + disiplin jangka panjang.'],
            ['kode' => 'P06', 'judul' => 'Recovery: kembali ke metode — BUKAN besarkan lot', 'penjelasan' => 'Besarkan lot saat drawdown = cara paling cepat kehilangan semua. Sabar + ikuti momen = recovery.'],
            ['kode' => 'P07', 'judul' => 'Backtest = kepercayaan diri yang nyata', 'penjelasan' => 'Data backtest berkata: metode ini bekerja. Pegang itu saat loss. Bukan overconfidence — ini evidence.'],
            ['kode' => 'P08', 'judul' => 'Persiapkan RISIKO dulu — bukan profit', 'penjelasan' => 'Profit adalah hasil yang tidak bisa dikontrol. Risiko adalah angka yang kamu tentukan sendiri.'],
        ];

        foreach ($principles as $p) {
            Principle::create($p);
        }

        $this->command->info('Berhasil import data prinsip trading (silakan lengkapi sesuai file asli).');
    }
}
