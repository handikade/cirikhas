<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StokRequest;
use App\Produk;
use App\Stok;
use Session;

class StokController extends Controller {
  public function create() {

  }

  public function store(StokRequest $request) {
    $stok = Stok::create($request->all());
    Session::flash('flash_message', 'Data stok berhasil ditambahkan!');
    return redirect('admin/produk/' . $stok->produk->id . '/stok');
  }

  public function show() {

  }

  public function edit(Stok $stok) {
    return view('admin.stok.edit', compact('stok'));
  }

  public function update(Stok $stok, StokRequest $request) {
    $input = $request->all();
    $stok->update($input);
    Session::flash('flash_message', 'Data stok berhasil diedit!');
    return redirect('admin/produk/' . $stok->produk->id . '/stok');
  }

  public function destroy(Stok $stok) {
    $produk = $stok->produk;
    $stok->delete();
    return redirect('admin/produk/' . $produk->id . '/stok');
  }
}
