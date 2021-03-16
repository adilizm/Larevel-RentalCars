<?php

namespace Database\Factories;


use App\Models\Brand;
use App\Models\Car;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                      'type_fule'=> $this->faker->name(),
                      'model'=> $this->faker->realText(20),
                      'type_car'=> $this->faker->realText(20),
                     
                      'plaka'=> $this->faker->realText(20),
                      'speedTo100km'=> $this->faker->numberBetween(2,16),
                      'Number_perso'=> $this->faker->numberBetween(2,7),
                      'Number_balisat'=> $this->faker->numberBetween(1,5),
                      'gear_type'=> $this->faker->realText(20),
                      'Price_one_day'=> $this->faker->numberBetween(645,7000),
                      'Door_number'=> $this->faker->numberBetween(2,6),
                      'Seat_number'=> $this->faker->numberBetween(2,6),
                      'motor_model'=> $this->faker->realText(20),
                      'car_price'=> $this->faker-> numberBetween(120,1820),
                      'hors_power'=> $this->faker->numberBetween(160,1400),
                      'car_description'=> $this->faker->paragraph(),
                      'Distance_fee'=> $this->faker->numberBetween(2,5)
        ];
    }
}
