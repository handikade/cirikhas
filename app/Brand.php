<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
  protected $table = 'brand';
  protected $fillable = ['nama'];

  public function setNamaAttribute($nama) {
    $this->attributes['nama'] = strtolower($nama);
  }

  public function getNamaAttribute($nama) {
    return ucwords($nama);
  }

  public function produk() {
    return $this->hasOne('App\Produk', 'brand_id');
  }
}
