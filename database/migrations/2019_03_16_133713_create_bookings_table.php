2<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('booker_id')->nullable(false)->unsigned();
            $table->integer('type_id')->nullable(false)->unsigned();
            $table->integer('classroom_id')->nullable(false)->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('file');
            $table->integer('start')->nullable(false);
            $table->integer('end')->nullable(false);
            $table->integer('deleted')->nullable(false)->default(0);
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
        Schema::dropIfExists('bookings');
    }
}
