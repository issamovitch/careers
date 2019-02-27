<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email");
            $table->string("image")->nullable();
            $table->string("location")->default(1);
            $table->string("street")->nullable();
            $table->string("nstreet")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
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
        Schema::dropIfExists('subscribers');
    }
}
