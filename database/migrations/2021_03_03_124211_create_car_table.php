<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model',30);
            $table->string('type_fule',30);
            $table->string('type_car',30);
            $table->foreignId('brand_id')->constrained('brands');
            $table->string('plaka',20);
            $table->decimal('speedTo100km');
            $table->integer('Number_perso');
            $table->integer('Number_balisat');
            $table->string('gear_type');
            $table->decimal('Price_one_day');
            $table->integer('Door_number');
            $table->integer('Seat_number');
            $table->string('motor_model',50);
            $table->decimal('car_price');
            $table->integer('hors_power');
            $table->text('car_description');
            $table->decimal('Distance_fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_car');
    }
}
