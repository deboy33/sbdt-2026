<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    public function run(): void
    {
        // Diambil dari sheet "Checklist Entry" di file Jurnal_Trading_Backtes.xlsx
        $items = [
            ['step' => 'STEP 1 - SCAN', 'pertanyaan' => 'Setup ini pernah ada di data backtest metode saya'],
            ['step' => 'STEP 1 - SCAN', 'pertanyaan' => 'Kondisi market sesuai kriteria metode — bukan feeling'],

            ['step' => 'STEP 2 - H1 Ranging', 'pertanyaan' => 'Zona ranging terbentuk di H1 (minimal 5 candle sideways)'],
            ['step' => 'STEP 2 - H1 Ranging', 'pertanyaan' => 'Batas ATAS ranging sudah ditandai di chart'],
            ['step' => 'STEP 2 - H1 Ranging', 'pertanyaan' => 'Batas BAWAH ranging sudah ditandai di chart'],
            ['step' => 'STEP 2 - H1 Ranging', 'pertanyaan' => 'Area TP (S/R berikutnya) sudah terlihat jelas'],

            ['step' => 'STEP 3 - M15 Konfirmasi', 'pertanyaan' => '[REVERSAL] Harga menyentuh batas ranging + rejection candle'],
            ['step' => 'STEP 3 - M15 Konfirmasi', 'pertanyaan' => '[REVERSAL] Candle konfirmasi sudah CLOSE sempurna di M15'],
            ['step' => 'STEP 3 - M15 Konfirmasi', 'pertanyaan' => '[BREAKOUT] Candle M15 CLOSE di luar ranging — bukan shadow'],
            ['step' => 'STEP 3 - M15 Konfirmasi', 'pertanyaan' => '[BREAKOUT] Candle breakout lebih besar + momentum nyata'],

            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'Entry sudah ditentukan — harga berapa'],
            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'SL sudah ditentukan — risiko sudah diketahui dari sekarang'],
            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'TP sudah ditentukan di S/R berikutnya yang jelas'],
            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'R:R minimal 1:1.5 sudah dihitung'],
            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'Lot sesuai aturan money management — BUKAN karena emosi atau streak'],
            ['step' => 'STEP 4 - Risk Management', 'pertanyaan' => 'Risk per trade tidak lebih dari 1% modal'],

            ['step' => 'STEP 5 - Psikologi', 'pertanyaan' => 'Emosi saat ini: Tenang / Percaya Diri (bukan FOMO/Revenge/Serakah)'],
            ['step' => 'STEP 5 - Psikologi', 'pertanyaan' => 'Tidak sedang dalam kondisi setelah consecutive loss'],
            ['step' => 'STEP 5 - Psikologi', 'pertanyaan' => 'Equity hari ini belum kena SL harian (50%)'],
            ['step' => 'STEP 5 - Psikologi', 'pertanyaan' => 'Sudah terima semua skenario: TP kena / SL kena / false break'],
        ];

        foreach ($items as $item) {
            Checklist::create([
                'step' => $item['step'],
                'pertanyaan' => $item['pertanyaan'],
                'checked' => false,
            ]);
        }

        $this->command->info('Berhasil import ' . count($items) . ' checklist entry.');
    }
}
