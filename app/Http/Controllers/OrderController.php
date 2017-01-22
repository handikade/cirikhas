<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Order;
use \Cart as Cart;

class OrderController extends Controller {
  public function index() {
    $list_order = Order::all();
    return view('admin.order.index', compact('list_order'));
  }

  public function destroy(Order $order) {
    $order->delete();
    Session::flash('flash_message', 'Data pemesanan berhasil dihapus!');
    return redirect('admin/order');
  }

  public function show(Order $order) {

    return view('admin.order.show');
  }

  public function store(Request $request) {
    $order = new Order();
    $order->user_id = $request->user_id;
    $order->bank_id = $request->bank_id;
    $order->biaya_belanja = $request->biaya_belanja;
    $order->biaya_transfer = $request->biaya_transfer;
    $order->alamat = $request->alamat;
    $order->hp_penerima = $request->hp_penerima;
    $order->nama_penerima = $request->nama_penerima;
    $order->save();

    

    Cart::destroy();

    return redirect('/');
  }

}
