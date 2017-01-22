<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paket;
use App\Ekspedisi;
use App\Http\Requests\PaketRequest;
use Session;


class PaketController extends Controller {
    public function index() {
      $list_paket = Paket::all();
      $list_ekspedisi = Ekspedisi::lists('nama', 'id');
      return view('admin.paket.index', compact('list_paket', 'list_ekspedisi'));
    }

    public function store(Request $request) {
      Paket::create($request->all());
      Session::flash('flash_message', 'Data paket berhasil ditambahkan!');
      return redirect('admin/paket');
    }

    public function destroy(Paket $paket) {
        $paket->delete();
        Session::flash('flash_message', 'Data paket berhasil dihapus!');
        Session::flash('penting', true);
        return redirect('admin/paket');
    }
}
