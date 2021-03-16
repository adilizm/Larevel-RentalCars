<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable=[
                    'car_id',
                    'Costumer_First_name',
                    'Costumer_Last_name',
                    'Phone_number',
                    'Costumer_email',
                    'Start_renting',
                    'End_renting',
                    'Price',
                    'Is_paid',
                    'Note',
                    'Confermed',
                    'Canceled'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
