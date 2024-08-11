<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'idpesanan';
    protected $fillable = ['tanggal_pesanan', 'id_menu', 'jumlah', 'subtotal', 'total_pesanan'];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'idpesanan');
    }
}
