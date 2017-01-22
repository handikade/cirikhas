<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model {
  protected $table = 'voucher';
  protected $fillable = [
    'mulai', 'berakhir', 'kode', 'tipe', 'harga', 'persen', 'sasaran'
  ];

  public function setKodeAttribute($kode) {
    $this->attributes['kode'] = strtoupper($kode);
  }
}
