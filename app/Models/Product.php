<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name',
        'price',
        'current',
        'img',
        'msg',
        "status",
    ];

    public function Updates():hasMany
    {
        return $this->hasMany(productUpdate::class,"product_id","id");
    }
    protected function casts(): array
    {
        return [
            'msg' => 'json',
        ];
    }
}
