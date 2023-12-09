<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_product',
        'qty'
    ];

    // protected $primaryKey = ['id_user', 'id_product'];
    

    public $timestamps = false;

    protected $table = 'ct_cart';
}
