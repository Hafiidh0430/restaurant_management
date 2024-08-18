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
        CREATE TRIGGER update_order_stok_trigger
        AFTER UPDATE ON detail_pesanan
        FOR EACH ROW
        BEGIN
            UPDATE data_menu
            SET stok = jumlah * NEW.harga_menu
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
    }
};
