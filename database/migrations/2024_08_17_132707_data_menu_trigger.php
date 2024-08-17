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
            CREATE TRIGGER data_menu_trigger
            AFTER UPDATE ON data_menu
            FOR EACH ROW
            BEGIN
                UPDATE detail_pesanan
                SET subtotal = jumlah * NEW.harga_menu
                WHERE id_menu = NEW.idmenu;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER pesanan_trigger');
    }
};
