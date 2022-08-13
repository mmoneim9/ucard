<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manualrechargelog extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
       Schema::create('manualrechargelog', function (Blueprint $table) {
           $table->id();
           $table->string('email');
           $table->string('amount');
           $table->string('game');
           $table->enum('done',['Y','N'])->default('N');
           $table->string('playerid');
           $table->string('cardtype')->nullable();
           $table->string('cardno')->nullable();
           $table->date('dt');
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('manualrechargelog');
   }
}
