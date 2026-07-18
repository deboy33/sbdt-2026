<?php

namespace Database\Seeders;

use App\Models\EquitySnapshot;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EquitySnapshotSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/equity.csv');

        if (!file_exists($path)) {
            $this->command->error("File tidak ditemukan: $path");
            return;
        }

        $handle = fopen($path, 'r');
        $header = fgetcsv($handle);

        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);

            // Skip baris "Start" yang tanggalnya bukan format tanggal
            $tanggal = null;
            try {
                $tanggal = Carbon::parse($data['tanggal'])->format('Y-m-d');
            } catch (\Exception $e) {
                continue; // skip baris "Start"
            }

            EquitySnapshot::create([
                'trade_no' => (int) round((float) $data['trade_no']),
                'tanggal' => $tanggal,
                'equity' => $data['equity'] !== '' ? (float) $data['equity'] : null,
                'drawdown_pct' => $data['drawdown_pct'] !== '' ? (float) $data['drawdown_pct'] : null,
                'pair' => $data['pair'] !== '' && $data['pair'] !== '—' ? $data['pair'] : null,
            ]);
            $count++;
        }
        fclose($handle);

        $this->command->info("Berhasil import $count data equity snapshot.");
    }
}
