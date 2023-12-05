<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTOrder extends Model
{
    use HasFactory;
    public $fillable = [
        'id_order',
        'id_product',
        'qty',
        'sellprice',
        'total_item'
    ];

    public $timestamps = false;
    protected $table = 'ct_order';
}
