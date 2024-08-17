<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared('
        CREATE TRIGGER detail_pesanan_trigger
        BEFORE INSERT ON detail_pesanan
        FOR EACH ROW
        BEGIN
            SET NEW.subtotal = NEW.jumlah * (SELECT harga_menu FROM data_menu WHERE idmenu = NEW.id_menu);
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER detail_pesanan_trigger');
    }
};
