<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productUpdate extends Model
{
    use HasFactory;
    protected $table = "product_updates";
    protected $fillable = [
        'price',
        'current',
        'product_id',
    ];
}
