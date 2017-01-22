<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\VoucherRequest;
use App\Voucher;
use Session;

class VoucherController extends Controller {
  public function index() {
    $list_voucher = Voucher::orderBy('id', 'DESC')->paginate(5);
    return view('admin.voucher.index', compact('list_voucher'));
  }

  public function create() {
    return view('admin.voucher.create');
  }

  public function edit(Voucher $voucher) {
    return view('admin.voucher.edit', compact('voucher'));
  }

  public function store(VoucherRequest $request) {
    $input = $request->all();
    $voucher = new Voucher();

    $voucher->sasaran = $input['sasaran'];
    $voucher->kode = $input['kode'];
    $voucher->mulai = $input['mulai'];
    $voucher->berakhir = $input['berakhir'];
    $voucher->tipe = $input['tipe'];

    if($voucher->tipe == 'nominal') {
      $voucher->nominal = $input['nominal'];
      $voucher->persentase = null;
    }

    else {
      $voucher->persentase = $input['persentase'];
      $voucher->nominal = null;
    }

    $voucher->save();

    Session::flash('flash_message', 'Data voucher berhasil ditambahkan!');
    return redirect('admin/voucher');
  }

  public function update(Voucher $voucher, VoucherRequest $request) {
    $input = $request->all();

    $voucher->sasaran = $input['sasaran'];
    $voucher->kode = $input['kode'];
    $voucher->mulai = $input['mulai'];
    $voucher->berakhir = $input['berakhir'];
    $voucher->tipe = $input['tipe'];

    if($voucher->tipe == 'nominal') {
      $voucher->nominal = $input['nominal'];
      $voucher->persentase = null;
    }

    else {
      $voucher->persentase = $input['persentase'];
      $voucher->nominal = null;
    }

    $voucher->save();

    Session::flash('flash_message', 'Data voucher berhasil diupdate!');
    return redirect('admin/voucher');
  }

  public function destroy(Voucher $voucher) {
    $voucher->delete();
    Session::flash('flash_message', 'Data voucher berhasil dihapus!');
    Session::flash('penting', true);
    return redirect('admin/voucher');
  }
}
