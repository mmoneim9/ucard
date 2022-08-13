<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usermobile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('usermobile', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->string('email')->unique();
             $table->string('password');
             $table->integer('balance');
             $table->integer('activationcode');
             $table->enum('approve',['Y','N'])->default('N');
             $table->enum('isautorecharge',['Y','N'])->default('N');
             $table->string('shopname')->nullable();
             $table->string('mobile')->nullable();
             $table->string('address')->nullable();
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
         Schema::dropIfExists('usermobile');
     }
}
