<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder {
  public function run() {
    DB::table('kategori')->delete();

    DB::table('kategori')->insert(['nama' => 'pria']);
    DB::table('kategori')->insert(['nama' => 'wanita']);
    DB::table('kategori')->insert(['nama' => 'kemeja']);
    DB::table('kategori')->insert(['nama' => 'rok']);
    DB::table('kategori')->insert(['nama' => 'celana']);
    DB::table('kategori')->insert(['nama' => 'outer']);
    DB::table('kategori')->insert(['nama' => 'aksesoris']);
  }
}
