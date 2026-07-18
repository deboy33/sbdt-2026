<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trader_settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_trader')->nullable();
            $table->decimal('modal_awal', 18, 2)->default(0);
            $table->decimal('sl_harian_pct', 5, 2)->default(50); // % dari modal
            $table->decimal('target_return_pct', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trader_settings');
    }
};
