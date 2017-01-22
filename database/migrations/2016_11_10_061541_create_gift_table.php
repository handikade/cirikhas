<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftTable extends Migration {
  public function up() {
    Schema::create('gift', function (Blueprint $table) {
      $table->increments('id');
      $table->string('pesan');
    });
  }

  public function down() {
    Schema::drop('gift');
  }
}
