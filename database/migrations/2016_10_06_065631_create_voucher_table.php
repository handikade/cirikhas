<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTable extends Migration {
  public function up() {
    Schema::create('voucher', function (Blueprint $table) {
      $table->increments('id');
      $table->dateTime('mulai');
      $table->dateTime('berakhir');
      $table->string('kode');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('voucher');
  }
}
