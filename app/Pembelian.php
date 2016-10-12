<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model {
  protected $table = 'pembelian';
  protected $fillable = [
    'user_id', 'alamat_id', 'paket_id', 'konfirmasi_id'
  ];

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function alamat() {
    return $this->belongsTo('App\Alamat', 'alamat_id');
  }

  public function konfirmasi() {
    return $this->hasOne('App\Konfirmasi', 'pembelian_id');
  }
}
