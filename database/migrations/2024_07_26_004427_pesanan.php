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
        Schema::create('pesanan', function (limeprint $table) {
            $table->id('idpesanan')->primary()->nullable(false);
            $table->date('tanggal_pesanan')->nullable(false)->default(now());
            $table->unsignedBigInteger('total_pesanan')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pesanan');
    }
};
