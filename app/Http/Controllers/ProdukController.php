<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk;
use App\Foto;
use App\Varian;
use App\Kategori;
use App\Brand;
use App\Http\Requests\ProdukRequest;
use Session;
use Storage;

class ProdukController extends Controller {
  public function index() {
    $list_produk = Produk::orderBy('id', 'DESC')->paginate(5);
    return view('admin.produk.index', compact('list_produk'));
  }

  public function create() {
    $list_brand = Brand::lists('nama', 'id');
    $list_kategori = Kategori::lists('nama', 'id');;
    return view('admin.produk.create', compact('list_brand', 'list_kategori'));
  }

  public function store(ProdukRequest $request) {
    $produk = new Produk;
    $produk->nama = $request->nama;
    $produk->bahan = $request->bahan;
    $produk->perawatan = $request->perawatan;
    $produk->deskripsi = $request->deskripsi;
    $produk->brand_id = $request->brand_id;
    $produk->diskon = $request->diskon;
    $produk->harga = $request->harga;
    $produk->harga_diskon = ((100 - $request->diskon) / 100) * $request->harga;

    $produk->save();
    $produk->kategori()->attach($request->input('kategori_produk'));

    if($request->hasFile('foto_utama')) {
      $foto_utama = new Foto;
      $foto_utama->produk_id = $produk->id;
      $foto_utama->url = $this->uploadImage($request->file('foto_utama'), 'U');
      $foto_utama->save();
    }

    if($request->hasFile('foto_satu')) {
      $foto_satu = new Foto;
      $foto_satu->produk_id = $produk->id;
      $foto_satu->url = $this->uploadImage($request->file('foto_satu'), '1');
      $foto_satu->save();
    }

    if($request->hasFile('foto_dua')) {
      $foto_dua = new Foto;
      $foto_dua->produk_id = $produk->id;
      $foto_dua->url = $this->uploadImage($request->file('foto_dua'), '2');
      $foto_dua->save();
    }

    if($request->hasFile('foto_tiga')) {
      $foto_tiga = new Foto;
      $foto_tiga->produk_id = $produk->id;
      $foto_tiga->url = $this->uploadImage($request->file('foto_tiga'), '3');
      $foto_tiga->save();
    }

    Session::flash('flash_message', 'Data produk berhasil ditambahkan!');
    return redirect('admin/produk');
  }

  public function show(Produk $produk) {
    $foto = $produk->foto->first();
    return view('admin.produk.show', compact('produk', 'foto'));
  }

  public function edit(Produk $produk) {
    $list_brand = Brand::lists('nama', 'id');
    $list_kategori = Kategori::lists('nama', 'id');
    return view('admin.produk.edit', compact('produk', 'list_brand', 'list_kategori'));
  }

  public function update(Produk $produk, ProdukRequest $request) {
    $input = $request->all();
    $produk->update($input);
    Session::flash('flash_message', 'Data produk berhasil diedit!');
    return redirect('admin/produk/' . $produk->id);
  }

  public function destroy(Produk $produk) {
    $this->deleteImage($produk);
    $produk->delete();
    Session::flash('flash_message', 'Data produk berhasil dihapus!');
    Session::flash('penting', true);
    return redirect('admin/produk');
  }

  public function stok(Produk $produk) {
    $foto = $produk->foto->first();
    $list_stok = $produk->stok;
    return view('admin.produk.stok', compact('produk', 'foto', 'list_stok'));
  }

  private function uploadImage($image, $name) {
    $ext = $image->getClientOriginalExtension();
    if($image->isValid()) {
      $title = $name . '-' . date('YmdHis') . '.' . $ext;
      $path = 'images/photos';
      $image->move($path, $title);

      return $title;
    }
    return false;
  }

  private function deleteImage(Produk $produk) {
    $list_foto = $produk->foto;

    foreach($list_foto as $foto) {
      Storage::disk('photos')->delete($foto->url);
    }
  }
}
