<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model {
  protected $table = 'kategori';
  protected $fillable = ['nama'];

  public function produk() {
    return $table->belongsToMany('App\Kategori', 'produk_kategori', 'kategori_id', 'produk_id');
  }
}
