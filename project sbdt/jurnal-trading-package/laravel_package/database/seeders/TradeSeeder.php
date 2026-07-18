<?php

namespace Database\Seeders;

use App\Models\Trade;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TradeSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/trades.csv');

        if (!file_exists($path)) {
            $this->command->error("File tidak ditemukan: $path");
            return;
        }

        $handle = fopen($path, 'r');
        $header = fgetcsv($handle);

        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);

            Trade::create([
                'no' => $this->toInt($data['no']),
                'bulan' => $this->blank($data['bulan']),
                'tanggal' => $this->toDate($data['tanggal']),
                'pair' => $data['pair'],
                'metode' => $this->blank($data['metode']),
                'arah' => $this->blank($data['arah']),
                'timeframe' => $this->blank($data['timeframe']),
                'sesi' => $this->blank($data['sesi']),
                'lot' => $this->toFloat($data['lot']),
                'entry' => $this->toFloat($data['entry']),
                'sl' => $this->toFloat($data['sl']),
                'tp' => $this->toFloat($data['tp']),
                'risk_rp' => $this->toFloat($data['risk_rp']),
                'reward_rp' => $this->toFloat($data['reward_rp']),
                'rr_target' => $this->toFloat($data['rr_target']),
                'hasil_wl' => $this->blank($data['hasil_wl']),
                'hasil_rp' => $this->toFloat($data['hasil_rp']),
                'rr_actual' => $this->toFloat($data['rr_actual']),
                'pip' => $this->toFloat($data['pip']),
                'drawdown_pct' => $this->toFloat($data['drawdown_pct']),
                'running_equity' => $this->toFloat($data['running_equity']),
                'dd_dari_peak' => $this->toFloat($data['dd_dari_peak']),
                'emosi' => $this->blank($data['emosi']),
                'alasan_entry' => $this->blank($data['alasan_entry']),
                'catatan' => $this->blank($data['catatan']),
                'screenshot' => $this->blank($data['screenshot']),
            ]);
            $count++;
        }
        fclose($handle);

        $this->command->info("Berhasil import $count data trade.");
    }

    private function blank($v)
    {
        return ($v === '' || $v === null) ? null : $v;
    }

    private function toInt($v)
    {
        return ($v === '' || $v === null) ? null : (int) round((float) $v);
    }

    private function toFloat($v)
    {
        return ($v === '' || $v === null) ? null : (float) $v;
    }

    private function toDate($v)
    {
        if ($v === '' || $v === null) {
            return null;
        }
        try {
            return Carbon::parse($v)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
