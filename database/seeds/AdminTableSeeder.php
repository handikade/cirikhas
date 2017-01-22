<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {
  public function run() {
    DB::table('admin')->delete();

    DB::table('admin')->insert([
      'nama'      => 'Super Admin',
      'username'  => 'admin',
      'password'  => bcrypt('1234abcd'),
      'level'     => '0',
    ]);
  }
}
