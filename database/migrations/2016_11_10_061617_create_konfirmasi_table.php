<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiTable extends Migration {
  public function up() {
    Schema::create('konfirmasi', function (Blueprint $table) {
      $table->increments('id');
      $table->enum('status', ['lunas', 'belum'])->default('belum');
      $table->integer('admin_id')->unsigned()->nullable();
      $table->foreign('admin_id')
            ->references('id')->on('admin')
            ->onDelete('set null');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('konfirmasi');
  }
}
