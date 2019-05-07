<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {

                $table->increments('id');
                $table->string('user_track');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id')->references('id')
                    ->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->dateTime('expired_at');
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
        Schema::dropIfExists('likes');
    }
}
