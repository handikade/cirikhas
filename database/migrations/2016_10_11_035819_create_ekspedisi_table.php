<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkspedisiTable extends Migration {
  public function up() {
    Schema::create('ekspedisi', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('logo')->nullable();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('ekspedisi');
  }
}
