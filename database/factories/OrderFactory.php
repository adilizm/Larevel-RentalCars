<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                    'Costumer_First_name'=>$this->faker->firstName(),
                    'Costumer_Last_name'=>$this->faker->lastName(),
                    'Phone_number'=>$this->faker->phoneNumber(),
                    'Costumer_email'=>$this->faker->email(),
                    'Start_renting'=>$this->faker->date(),
                    'End_renting'=>$this->faker->date(),
                    'Price'=>$this->faker->numberBetween(210,700),
                    'Is_paid'=>$this->faker->boolean(),
                    'Note'=>$this->faker->text(),
                    'Confermed'=>$this->faker->boolean(),
                    'Canceled'=>$this->faker->boolean()
        ];
    }
}
