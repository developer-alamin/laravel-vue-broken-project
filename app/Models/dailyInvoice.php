<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\hasManyThrough;

class dailyInvoice extends Model
{
    use HasFactory;
    protected $table = "daily_invoices";
    protected $fillable = [
        'taka',
        'note',
        'user_id',
        "status",
    ];
    protected function casts(): array
    {
        return [
            'note' => 'json',
        ];
    }
    public function users() :hasOne
    {
        return $this->hasOne(user::class,"id","user_id");
    }
}
