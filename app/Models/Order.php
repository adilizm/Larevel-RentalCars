<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
use SoftDeletes;

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
                    'Canceled',
                    'is_deleted',
                    'start_hour',
                    'Finish_hour',
                    'client_Country',
                    'orders_as_json',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
