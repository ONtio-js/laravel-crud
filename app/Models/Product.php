<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //using this method to access the cars with a particular product from this instance
    public function cars(){
        return $this->belongsToMany(car::class);
    }
}
