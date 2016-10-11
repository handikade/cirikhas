<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('ekspedisi_id')->unsigned();
            $table->string('ongkos_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('paket');
    }
}
