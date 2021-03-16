<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars');
            $table->string('Costumer_First_name',40);
            $table->string('Costumer_Last_name',40);
            $table->string('Phone_number');
            $table->string('Costumer_email')->nullable();
            $table->date('Start_renting');
            $table->date('End_renting')->nullable();
            $table->decimal('Price',7,2);
            $table->boolean('Is_paid');
            $table->text('Note')->nullable();
            $table->boolean('Confermed');
            $table->boolean('Canceled');
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
        Schema::dropIfExists('order');
    }
}
