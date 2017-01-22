<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use App\Http\Requests;
use App\Kategori;
use Session;

class KategoriController extends Controller {
  public function index() {
    $list_kategori = Kategori::orderBy('id', 'DESC')->paginate(5);
    return view('admin.kategori.index', compact('list_kategori'));
  }

  public function create() {
    return view('admin.kategori.create');
  }

  public function store(KategoriRequest $request) {
    $input = $request->all();
    kategori::create($input);
    Session::flash('flash_message', 'Data kategori berhasil ditambahkan!');
    return redirect('admin/kategori');
  }

  public function edit(Kategori $kategori) {
    return view('admin.kategori.edit', compact('kategori'));
  }

  public function update(Kategori $kategori, KategoriRequest $request) {
    $input = $request->all();
    $kategori->update($input);
    Session::flash('flash_message', 'Data kategori berhasil diupdate!');
    return redirect('admin/kategori');
  }

  public function destroy(Kategori $kategori) {
    $kategori->delete();
    Session::flash('flash_message', 'Data kategori berhasil dihapus!');
    Session::flash('penting', true);
    return redirect('admin/kategori');
  }
}
