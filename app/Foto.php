<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
  protected $table = 'foto';
  protected $fillable = ['url'];

  public function produk() {
    return $this->belongsTo('App\Produk', 'produk_id');
  }
}
