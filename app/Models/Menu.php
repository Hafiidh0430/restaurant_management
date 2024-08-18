<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Menu extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'data_menu';
    protected $primaryKey = 'idmenu';
    protected $fillable = ['image', 'nama_menu', 'harga_menu', 'stok'];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_menu', 'idmenu');
    }
} 
