<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {
  public function up() {
    Schema::create('admin', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('username')->unique();
      $table->string('password');
      $table->enum('level', ['0', '1', '2']);
      $table->string('logo')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('admin');
  }
}
