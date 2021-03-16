<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCar extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'model'=>'bail|required|string|min:3|max:20',
        'type_fule'=>'bail|required|string',
        'type_car'=>'bail|required|string',
        'brand_id'=>'bail|required|Integer',
        'plaka'=>'bail|required|string',
        'speedTo100km'=>'bail|required|Numeric',
        'Number_perso'=>'bail|required|Integer',
        'Number_balisat'=>'bail|required|Integer',
        'gear_type'=>'bail|required|string',
        'Price_one_day'=>'bail|required|Numeric',
        'Door_number'=>'bail|required|Integer',
        'Seat_number'=>'bail|required|Integer',
        'motor_model'=>'bail|required|string',
        'car_price'=>'bail|required|Numeric',
        'hors_power'=>'bail|required|Integer',
        'car_description'=>'bail|required|string',
        'Distance_fee'=>'bail|required|Numeric',
        'images'=>'required',
        'images.*'=>'mimes:jpeg,jpg,png',
        ];
    }
}
