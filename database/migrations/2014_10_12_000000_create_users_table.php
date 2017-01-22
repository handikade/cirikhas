<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('email')->unique()->nullable();
      $table->string('password');
      $table->string('no_hp');
      $table->unsignedInteger('poin');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('users');
  }
}
