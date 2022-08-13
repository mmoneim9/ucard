<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manualgames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(){

     Schema::create('manualgames', function (Blueprint $table) {
         $table->id();
         $table->string('gamename');
         $table->string('cardtype');
         $table->integer('price');
         $table->string('img');
     });
       }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
     Schema::dropIfExists('manualgames');
   }
 }
