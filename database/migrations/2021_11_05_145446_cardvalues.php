<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cardvalues extends Migration
{
  public function up()
  {
    Schema::create('cardvalues', function (Blueprint $table) {
        $table->id();
        $table->string('cardid');
        $table->string('val',900);
        $table->integer('price');
        $table->enum('ischarged',['Y','N'])->default('N');
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
    Schema::dropIfExists('cardvalues');
  }
}
