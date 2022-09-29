<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $table = "cars";

    protected $primarykey = "id";

    public $timestamps = false;

    protected $dateFormat = "Y:m:d h:i:s";

    protected $fillable = ['name','founded','description','image_path','user_id'];

    protected $hidden = ['updated_at','created_at'];

    protected $visible = ['name','founded'];

    public function carModel(){
        return $this->hasMany(carModel::class);
    }

    public function Headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    public function engine(){
        return $this->hasManyThrough(
            Engine::class,
            carModel::class,
            'car_id',
            'model_id');
    }

    public function production(){
        return $this->hasOneThrough(
            CarProduction::class,
            carModel::class,
            'car_id',
            'model_id'
        );
    }

    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
