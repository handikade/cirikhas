<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTable extends Migration {
  public function up() {
    Schema::create('voucher', function (Blueprint $table) {
      $table->increments('id');
      $table->string('kode');
      $table->enum('sasaran', ['ongkos_kirim', 'harga_produk']);
      $table->enum('tipe', ['nominal', 'persentase']);
      $table->integer('nominal')->nullable();
      $table->integer('persentase')->nullable();
      $table->date('mulai');
      $table->date('berakhir');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('voucher');
  }
}
