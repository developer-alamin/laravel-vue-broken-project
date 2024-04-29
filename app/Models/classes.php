<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class classes extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $fillable = ["name","status"];

    public function users() : belongsToMany{
        return $this->belongsToMany(User::class,"inv_classes","class_id","users_id");
    }
   
}
