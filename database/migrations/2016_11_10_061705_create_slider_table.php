<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration {
    public function up() {
      Schema::create('slider', function (Blueprint $table) {
        $table->increments('id');
        $table->string('url');
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('slider');
    }
}
