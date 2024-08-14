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
        Schema::create('akun', function (limeprint $table) {
            $table->id('iduser')->nullable(false);
            $table->string('password')->nullable(false);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('akun');
    }
};
