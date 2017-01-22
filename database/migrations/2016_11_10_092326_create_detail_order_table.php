<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrderTable extends Migration {
  public function up() {
    Schema::create('detail_order', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('stok_id')->unsigned();
      $table->foreign('stok_id')
            ->references('id')->on('stok')
            ->onDelete('cascade');
      $table->integer('order_id')->unsigned();
      $table->foreign('order_id')
            ->references('id')->on('order')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('detail_order');
  }
}
