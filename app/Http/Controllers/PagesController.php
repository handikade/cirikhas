<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slider;
use App\Produk;
use App\Stok;
use App\Cart;
use Auth;
use App\Bank;

class PagesController extends Controller {
    public function home() {
      $list_slider = Slider::all();
      $list_produk = Produk::all();
      return view('shop.home', compact('list_produk', 'list_slider'));
    }

    public function produk(Produk $produk) {
      $list_stok = $produk->stok;
      return view('shop.show', compact('produk', 'list_stok'));
    }

    public function checkout() {
      $list_bank = Bank::all();
      return view('shop.checkout', compact('list_bank'));
    }
}
