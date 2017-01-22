<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder {
  public function run() {
    DB::table('brand')->delete();

    DB::table('brand')->insert(['nama' => 'Mora']);
    DB::table('brand')->insert(['nama' => 'Zoya']);
    DB::table('brand')->insert(['nama' => 'Zizara']);
    DB::table('brand')->insert(['nama' => 'Afra']);
    DB::table('brand')->insert(['nama' => 'Elzatta']);
    DB::table('brand')->insert(['nama' => 'Rabbani']);
    DB::table('brand')->insert(['nama' => 'Dika']);
  }
}
