<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
     User::factory(1)->create();
   /* $brands= Brand::factory(4)->create();

    $cars= Car::factory(10)->make()->each(function ($car) use ($brands) {
      $car->brand_id = $brands->Random()->id;
      $car->save();
    });

    Order::factory(60)->make()->each(function ($Order) use ($cars) {
      $Order->car_id = $cars->Random()->id;
      $Order->save();
    });

     Image::factory(130)->make()->each(function ($image) use ($cars) {
      $image->car_id= $cars->Random()->id;
      $image->save();
    });*/

  }
}
