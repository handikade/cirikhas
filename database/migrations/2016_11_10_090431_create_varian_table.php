<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarianTable extends Migration {
  public function up() {
    Schema::create('varian', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('produk_id')->unsigned();
      $table->foreign('produk_id')
            ->references('id')->on('produk')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('varian');
  }
}
