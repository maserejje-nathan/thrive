<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->text('title');
            $table->text('venue');
            $table->text('agenda');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyinteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations .
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
