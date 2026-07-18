<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable();
            $table->string('bulan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pair'); // XAUUSD / BTCUSD
            $table->string('metode')->nullable(); // Breakout Ranging, Reversal Batas, dll
            $table->string('arah')->nullable(); // BUY / SELL
            $table->string('timeframe')->nullable();
            $table->string('sesi')->nullable();
            $table->decimal('lot', 10, 4)->nullable();
            $table->decimal('entry', 18, 4)->nullable();
            $table->decimal('sl', 18, 4)->nullable();
            $table->decimal('tp', 18, 4)->nullable();
            $table->decimal('risk_rp', 18, 2)->nullable();
            $table->decimal('reward_rp', 18, 2)->nullable();
            $table->decimal('rr_target', 10, 4)->nullable();
            $table->string('hasil_wl')->nullable(); // WIN / LOSS
            $table->decimal('hasil_rp', 18, 2)->nullable();
            $table->decimal('rr_actual', 10, 4)->nullable();
            $table->decimal('pip', 18, 4)->nullable();
            $table->decimal('drawdown_pct', 10, 4)->nullable();
            $table->decimal('running_equity', 18, 2)->nullable();
            $table->decimal('dd_dari_peak', 18, 4)->nullable();
            $table->string('emosi')->nullable();
            $table->text('alasan_entry')->nullable();
            $table->text('catatan')->nullable();
            $table->string('screenshot')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
