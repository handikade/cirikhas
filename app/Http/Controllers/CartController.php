<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;
use App\Stok;
use \RajaOngkir as RajaOngkir;

class CartController extends Controller {
  public function index() {
    return view('shop.cart');
  }

  public function store(Request $request) {
    $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
      return $cartItem->id === $request->id;
    });

    if (!$duplicates->isEmpty()) {
      return redirect('cart')->withSuccessMessage('Item is already in your cart!');
    }

    else {
      $stok = Stok::find($request->id);

      if($stok->produk->diskon == 0) {
        Cart::add($stok->id, $stok->produk->nama, 1, $stok->produk->harga)->associate('App\Stok');
      }

      else {
        Cart::add($stok->id, $stok->produk->nama, 1, $stok->produk->harga_diskon)->associate('App\Stok');
      }

      return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }
  }

    public function update(Request $request, $id) {
      // Validation on max quantity
      $validator = Validator::make($request->all(), [
          'quantity' => 'required|numeric|between:1,5'
      ]);

       if ($validator->fails()) {
          session()->flash('error_message', 'Quantity must be between 1 and 5.');
          return response()->json(['success' => false]);
       }

       if($request->quantity > Cart::get($id)->model->stok) {
         session()->flash('error_message', 'Too much!');
         return redirect('cart')->withErrorMessage('Sisa stok produk ini hanya ' . Cart::get($id)->model->stok . '!');
       }

      Cart::update($id, $request->quantity);
      session()->flash('success_message', 'Quantity was updated successfully!');

      //return response()->json(['success' => true]);
      return redirect('cart')->withSuccessMessage('Item was updated in your cart!');

    }

    public function destroy($id) {
      Cart::remove($id);
      return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    public function emptyCart() {
      Cart::destroy();
      return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }
}
