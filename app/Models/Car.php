<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'model',
        'type_fule',
        'type_car',
        'brand_id',
        'plaka',
        'speedTo100km',
        'Number_perso',
        'Number_balisat',
        'gear_type',
        'Price_one_day',
        'Door_number',
        'Seat_number',
        'motor_model',
        'car_price',
        'hors_power',
        'car_description',
        'Distance_fee'
    ];
    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function Images()
    {
        return $this->hasMany(Image::class);
    }
    public function Orders()
    {
        return $this->belongsTo(Order::class);
    }
}
