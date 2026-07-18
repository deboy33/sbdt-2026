<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equity_snapshots', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_no')->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('equity', 18, 2)->nullable();
            $table->decimal('drawdown_pct', 10, 4)->nullable();
            $table->string('pair')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equity_snapshots');
    }
};
