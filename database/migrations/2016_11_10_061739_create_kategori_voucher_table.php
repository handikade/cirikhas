<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriVoucherTable extends Migration {
    public function up() {
      Schema::create('kategori_voucher', function(Blueprint $table) {
        $table->integer('voucher_id')->unsigned()->index();
        $table->foreign('voucher_id')
              ->references('id')->on('voucher')
              ->onDelete('cascade');
        $table->integer('kategori_id')->unsigned()->index();
        $table->foreign('kategori_id')
              ->references('id')->on('kategori')
              ->onDelete('cascade');
        $table->primary(['voucher_id', 'kategori_id']);
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('kategori_voucher');
    }
}
