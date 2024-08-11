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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan')->nullable(false);
            $table->unsignedBigInteger('id_menu')->nullable(false);
            $table->unsignedBigInteger('jumlah')->nullable(false);
            $table->unsignedBigInteger('subtotal')->nullable(false);

            $table->foreign('id_menu')
                ->references('idmenu')
                ->on('data_menu')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('detial_pesanan');
    }
};
