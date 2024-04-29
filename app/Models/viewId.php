<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class viewId extends Model
{
    use HasFactory;
    protected $table = "view_ids";
    protected $fillable = [
        "IdName"
    ];

    public function users() : HasOne {
        return $this->hasOne(User::class,"id","user_id");
    }
    public function profile() : HasOne {
        return $this->hasOne(profile::class,"users_id","user_id");
    }
}
