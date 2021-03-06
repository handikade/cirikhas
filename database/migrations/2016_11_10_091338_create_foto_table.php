<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoTable extends Migration {
  public function up() {
    Schema::create('foto', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('produk_id')->unsigned();
      $table->foreign('produk_id')
            ->references('id')->on('produk')
            ->onDelete('cascade');
      $table->string('url');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('foto');
  }
}
