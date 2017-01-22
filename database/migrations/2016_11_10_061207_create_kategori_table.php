<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration {
  public function up() {
    Schema::create('kategori', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('kategori');
  }
}
