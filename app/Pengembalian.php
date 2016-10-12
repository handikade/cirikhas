<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model {
  protected $table = 'pengembalian';
  protected $fillable = [
    'pembelian_id', 'keterangan'
  ];

  public function pembelian() {
    return $this->belongsTo('App\Pembelian', 'pembelian_id');
  }
}
