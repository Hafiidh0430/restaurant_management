<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Akun extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'akun';
    protected $primaryKey = 'iduser';
    protected $fillable = ['username','password'];
}
