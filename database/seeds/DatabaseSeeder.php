<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
      Eloquent::unguard();

      $this->call('BrandTableSeeder');
      $this->command->info('Brand table seeded');

      $this->call('KategoriTableSeeder');
      $this->command->info('Kategori table seeded');

      $this->call('AdminTableSeeder');
      $this->command->info('Kategori table seeded');
    }
}
