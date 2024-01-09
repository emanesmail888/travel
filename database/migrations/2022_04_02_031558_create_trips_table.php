<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_title');
            $table->integer('trip_price');
            $table->string('image')->nullable();
            $table->text('program');
            $table->text('activities');

            $table->integer('category_id');
            // $table->integer('tripType_id');
            // $table->enum('choices', ['foo', 'bar'])->nullable()->default(['foo', 'bar']);
            $table->string('season');
            $table->string('tripType');
           // $table->enum('season', ['Summer', 'Winter', 'Autumn','Spring']);
            //$table->enum('tripType', ['Exploration','Activities','Therapy','Recovery','Luxury ','Adventure ','education']);


            // $table->string('spl_price')->nullable();
            $table->integer('duration');
            $table->text('from');
            $table->text('to');

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
        Schema::dropIfExists('trips');
    }
}
