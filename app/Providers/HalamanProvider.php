<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanProvider extends ServiceProvider {
    public function boot() {
      $halaman = '';
      $segment2 = Request::segment(2);
      $segment1 = Request::segment(1);

      if ($segment2 == 'dashboard') {
        $halaman = 'dashboard';
      }

      if ($segment2 == 'bank' || $segment2 == 'ekspedisi' || $segment2 == 'paket') {
        $halaman = 'pengiriman';
      }

      if ($segment2 == 'produk' || $segment2 == 'kategori' || $segment2 == 'brand') {
        $halaman = 'penjualan';
      }

      if ($segment2 == 'slider' || $segment2 == 'voucher') {
        $halaman = 'promosi';
      }

      if ($segment2 == 'admin' || $segment2 == 'pembeli') {
        $halaman = 'pengguna';
      }

      if ($segment2 == 'order') {
        $halaman = 'order';
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
