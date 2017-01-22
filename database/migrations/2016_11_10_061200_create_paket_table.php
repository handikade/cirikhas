<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketTable extends Migration {
  public function up() {
    Schema::create('paket', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->integer('ekspedisi_id')->unsigned();
      $table->foreign('ekspedisi_id')
            ->references('id')->on('paket')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('paket');
  }
}
