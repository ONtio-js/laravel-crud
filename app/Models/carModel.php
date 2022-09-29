<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carModel extends Model
{
    use HasFactory;
    protected $table = "car_models";

    protected $primarykey = "id";
    // public $timestamps = false;
    public function car(){
        return $this->belongsTo(car::class);
    }
}
