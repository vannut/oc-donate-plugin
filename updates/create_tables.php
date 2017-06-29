<?php namespace VanNut\Shop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreeerBasket extends Migration
{

    public function up()
    {
        Schema::create('vannut_donation', function ($table)
        {
            $table->timestamps();
            $table->increments('id');
            $table->string('uuid');
            $table->string('trid');
        });
        Schema::create('vannut_donation_status', function ($table)
        {
            $table->timestamps();
            $table->string('trid');
            $table->string('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vannut_donation');
        Schema::dropIfExists('vannut_donation_status');
    }

}
