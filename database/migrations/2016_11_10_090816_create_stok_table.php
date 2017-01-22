<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokTable extends Migration {
    public function up() {
      Schema::create('stok', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('produk_id')->unsigned();
        $table->foreign('produk_id')
              ->references('id')->on('produk')
              ->onDelete('cascade');
        $table->string('ukuran');
        $table->integer('stok');
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('stok');
    }
}
