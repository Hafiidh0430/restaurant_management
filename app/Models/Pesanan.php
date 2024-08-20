<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'idpesanan';
    protected $fillable = ['tanggal_pesanan', 'id_menu' , 'total_pesanan'];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'idpesanan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pesanan', 'idpesanan');
    }
}
