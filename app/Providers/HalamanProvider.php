<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
      $halaman = '';
      $segment2 = Request::segment(2);

      if ($segment2 == 'bank' || $segment2 == 'ekspedisi' || $segment2 == 'paket') {
        $halaman = 'pengiriman';
      }

      if ($segment2 == 'produk' || $segment2 == 'kategori' || $segment2 == 'brand' || $segment2 == 'voucher') {
        $halaman = 'penjualan';
      }

      view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
