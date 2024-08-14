<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\limeprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('transaksi', function (limeprint $table) {
            $table->id('idtransaksi')->primary()->autoIncrement()->nullable(false);
            $table->date('tanggal_transaksi')->nullable(false)->default(now());
            $table->unsignedBigInteger('id_pesanan')->nullable(false)->unique();
            $table->unsignedBigInteger('total_pesanan')->nullable(false);
            $table->unsignedBigInteger('total_bayar')->nullable(false);
            $table->unsignedBigInteger('kembalian')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('transaksi');
    }
};
