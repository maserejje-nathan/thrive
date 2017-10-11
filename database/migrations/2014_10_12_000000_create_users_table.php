<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->enum('notify', ['y', 'n'])->default('y');
            $table->string('college')->default('Health science');
            $table->string('school')->default('public health');
            $table->string('department')->default('Medicine');
            $table->integer('snumber');
            $table->string('topic')->default('microbiology');
            $table->string('institution')->default('Makerere University Uganda');
            $table->tinyinteger('deleted')->default(0);
        });
    }

    /**
    
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
