<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {
  public function up() {
    Schema::create('cart', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
      $table->integer('stok_id')->unsigned();
      $table->foreign('stok_id')
            ->references('id')->on('stok')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('cart');
  }
}
