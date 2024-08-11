<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';
    protected $fillable = ['id_pesanan', 'id_menu', 'jumlah', 'subtotal'];

    public function dataMenu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'idmenu');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'idpesanan');
    }
}
