<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('idtransaksi', 8)->primary()->nullable(false);
            $table->date('tanggal_transaksi')->nullable(false)->default(now());
            $table->unsignedBigInteger('id_pesanan')->nullable(false)->unique();
            $table->unsignedBigInteger('total_pesanan')->nullable(false);
            $table->unsignedBigInteger('total_bayar')->nullable(false);
            $table->unsignedBigInteger('kembalian')->nullable(true);

            $table->foreign('id_pesanan')
                ->references('idpesanan')
                ->on('pesanan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
