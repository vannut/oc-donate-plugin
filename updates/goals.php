<?php namespace VanNut\Shop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use October\Rain\Database\Schema\Blueprint;

class Goals extends Migration
{

    public function up()
    {
        Schema::create('vannut_goals', function ($table)
        {
            $table->timestamps();
            $table->increments('id');
            $table->decimal('target', 8, 2);
            $table->string('title');
            $table->text('description')->nullable();
        });
        Schema::table('vannut_donation', function (Blueprint $table) {
            $table->decimal('amount', 8, 2);
            $table->integer('goal_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vannut_goals');

    }

}
