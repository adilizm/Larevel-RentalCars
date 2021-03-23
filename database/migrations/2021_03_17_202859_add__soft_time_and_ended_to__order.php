<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftTimeAndEndedToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
            $table->boolean('is_deleted');
            $table->time('start_hour');
            $table->time('Finish_hour');
            $table->string('client_Country');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('is_deleted');
            $table->dropColumn('start_hour');
            $table->dropColumn('Finish_hour');
            $table->dropColumn('client_Country');
        });
    }
}
