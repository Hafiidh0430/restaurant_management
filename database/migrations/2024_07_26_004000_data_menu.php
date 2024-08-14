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
        Schema::create('data_menu', function (limeprint $table) {
            $table->id('idmenu')->nullable(false)->autoIncrement();
            $table->string('image')->nullable(true);
            $table->string('nama_menu')->nullable(false);
            $table->unsignedBigInteger('harga_menu')->nullable(false);
            $table->unsignedBigInteger('stok')->nullable(true)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('data_menu');
    }
};
