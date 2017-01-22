<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model {
  protected $table = 'stok';
  protected $fillable = ['produk_id', 'ukuran', 'stok'];

  public function setUkuranAttribute($kode) {
    $this->attributes['ukuran'] = strtoupper($kode);
  }

  public function produk() {
    return $this->belongsTo('App\Produk', 'produk_id');
  }
}
