<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkuranTable extends Migration {
    public function up() {
      Schema::create('ukuran', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ukuran');
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('ukuran');
    }
}
