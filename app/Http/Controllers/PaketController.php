<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paket;
use App\Ekspedisi;
use App\Http\Requests\PaketRequest;
use Session;


class PaketController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $list_paket = Paket::all();
      $list_ekspedisi = Ekspedisi::lists('nama', 'id');
      return view('admin.paket.index', compact('list_paket', 'list_ekspedisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaketRequest $request) {
      Paket::create($request->all());
      Session::flash('flash_message', 'Data paket berhasil ditambahkan!');
      return redirect('admin/paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket) {
        $paket->delete();
        Session::flash('flash_message', 'Data paket berhasil dihapus!');
        Session::flash('penting', true);
        return redirect('admin/paket');
    }
}