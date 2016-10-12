<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
  protected $table = 'produk';
  protected $fillable = [
    'nama', 'deskripsi', 'harga', 'brand_id', 'ukuran'
  ];

  public function kategori() {
    return $this->belongsToMany('App\Kategori', 'produk_kategori', 'produk_id', 'kategori_id');
  }

  public function foto() {
    return $this->belongsToMany('App\Foto', 'produk_foto', 'produk_id', 'foto_id')
  }
}
