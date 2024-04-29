<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class invClass extends Model
{
    use HasFactory;
    protected $table = "inv_classes";
    protected $fillable = ["class_id","users_id "]; 

}
