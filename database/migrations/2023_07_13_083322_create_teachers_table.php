<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('cap')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('description')->nullable();
            $table->text('cv')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('remote')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
