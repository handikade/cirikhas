<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model {
  protected $table = 'konfirmasi';
  protected $fillable = [
    'pembelian_id', 'admin_id'
  ];

  public function pembelian() {
    return $this->belongsTo('App\Pembelian', 'pembelian_id');
  }

  public function admin() {
    return $this->belongsTo('App\Admin', 'admin_id');
  }
}
