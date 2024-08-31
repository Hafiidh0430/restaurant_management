<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'idtransaksi';
    protected $fillable = ['tanggal_pesanan', 'id_pesanan' , 'total_pesanan', 'total_bayar', 'kembalian'];
    public $timestamps = false;
    public function transaksiPesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'idpesanan');
    }
}
