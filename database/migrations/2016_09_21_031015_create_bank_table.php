<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration {
  public function up() {
    Schema::create('bank', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama')->unique;
      $table->string('nomor_rekening')->unique;
      $table->string('atas_nama');
      $table->string('logo')->nullable();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('bank');
  }
}
