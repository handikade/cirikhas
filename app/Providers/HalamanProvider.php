<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanProvider extends ServiceProvider {
    public function boot() {
      $halaman = '';
      $segment2 = Request::segment(2);
      $segment1 = Request::segment(1);

      if ($segment2 == 'bank' || $segment2 == 'ekspedisi' || $segment2 == 'paket') {
        $halaman = 'pengiriman';
      }

      if ($segment2 == 'produk' || $segment2 == 'kategori' || $segment2 == 'brand' || $segment2 == 'voucher') {
        $halaman = 'penjualan';
      }

      if ($segment2 == 'admin' || $segment2 == 'pembeli') {
        $halaman = 'pengguna';
      }

      if ($segment1 == 'pemesanan') {
        $halaman = 'pemesanan';
      }

      if ($segment1 == 'pengembalian') {
        $halaman = 'pengembalian';
      }

      view()->share('halaman', $halaman);
    }

    public function register() {
        //
    }
}
