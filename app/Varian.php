<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varian extends Model {
  protected $table = 'varian';

  public function produk() {
    return $this->belongsTo('App\Produk', 'produk_id');
  }

  public function foto() {
    return $this->hasMany('App\Foto', 'varian_id');
  }
}
